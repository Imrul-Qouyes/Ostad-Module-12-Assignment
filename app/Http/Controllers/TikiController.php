<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use App\Models\TripLocation;
use App\Models\User;
use Illuminate\Http\Request;

class TikiController extends Controller
{
    function homepage(){
        return view('pages.home');
    }

    function bustrippage(){
        return view('pages.bustrip');
    }

    function addtriplocationpage(){

        return view('pages.addtriplocation');
    }
    function addtriplocation(Request $request){

        $location = $request->triplocation;

        $this->validate($request,['triplocation'=>'required']);

        TripLocation::create(['locationName'=>$location]); //Creating Locations

        return redirect()->back()->with(['success'=>'Location Added Successfully']);
    }


    function alllocation(){

        $result = TripLocation::get(); //Retrieving All Location

        return view('pages.alllocations',['results'=>$result]);
    }



    function removelocationpage(Request $request){

        $locationId = $request->id;

        return view('pages.removelocation',['id'=>$locationId]);
    }

    function confirmdeletelocation(Request $request){

        $locationId = $request->id;
        TripLocation::where('id','=',$locationId)->delete(); //Deleting Location

        return redirect()->route('alllocation')->with(['success'=>'Location Successfully Deleted']);
    }



    function addtrippage(){

        $result = TripLocation::get(); //Retrieving all Location to add trip

        return view('pages.addtrip',['results'=>$result]);
    }


    function confirmtrip(Request $request){

        $this->validate($request,[
            'journeydate'=>'required',
            'deperturetime'=>'required',
            'busfare'=>'required'
        ]);


        $from = $request->from;
        $to = $request->to;
        $errorMessForSamePlace = '';
        $success = ''; 

        //==========Formating Trip Time==========//
        $strtime = strtotime($request->deperturetime);
        $deptime = date('g:i A',$strtime); // For 12 hour Format along with AM/PM 
        //================================//


        if($from == $to) {
            $errorMessForSamePlace .= 'Warning!! FROM & TO are same place selected'; //Showing error for same place
        }else {
            //=======Creating New Trip========//
            Trip::create([
                'journey_date'=>$request->journeydate,
                'from'=>$request->from,
                'to'=>$request->to,
                'deperture_time'=>$deptime,
                'available_seats'=>$request->availableseats,
                'bus_fare'=>$request->busfare,
            ]);
            //===============================//

            //=============Allocating Seats===============//
            for($i = 1; $i <= 36; $i++){
                SeatAllocation::create([
                    'journey_date'=>$request->journeydate,
                    'from'=>$request->from,
                    'to'=>$request->to,
                    'deperture_time'=>$deptime,
                    'seat_number'=>$i,
                    'seat_status'=>'Available'
                ]);
                //===============================//
            }
            $success .= 'Trip created successfully.';
        }

        return redirect()->back()->with(['success'=>$success,'err'=>$errorMessForSamePlace]);
    }


    function findtrippage(){

        return view('pages.searchtrip');
    }


    function searchtrip(Request $request){

        $searchtripDate = $request->searchtrip;

        $this->validate($request,['searchtrip'=>'required']);

        $result = Trip::select('journey_date')->get(); // Getting All Available Trip Dates

        $searchedresult = [];
        $notripFound = 'No trip is available.';
     
        foreach($result as $item){
            
            if($searchtripDate == ($item->journey_date) ){
                //=============Getting All Trips For the selected date==================//
                $searchedresult = Trip::where('journey_date','=',$item->journey_date)->get();
            }            
            
        }
        return view('pages.availabletrip',['searchedresults'=>$searchedresult,'notripfound'=>$notripFound]);       
        
    }


    function bookseatspage(Request $request){

        $tripid = $request->tripid;
        $journeydate = $request->journeydate;
        $from = $request->from;
        $to = $request->to;
        $deperturetime = $request->deperturetime;
        $busfare = $request->busfare;

        //===========Getting Bus Seat Allocation For Selected Date trip=========//
        $allseats = SeatAllocation::where('journey_date',$journeydate)
        ->where('from',$from)
        ->where('to',$to)
        ->where('deperture_time',$deperturetime)
        ->get();
        //======================================================//

        return view('pages.bookseats',['tripid'=>$tripid,
        'journeydate'=>$journeydate,
        'from'=>$from,
        'to'=>$to,
        'deperturetime'=>$deperturetime,
        'busfare'=>$busfare,
        'allseats'=>$allseats]);
    }


    function buyseats(Request $request){

        $this->validate($request,[
            'customername'=>'required',
            'customerphone'=>'required',
            'seat'=>'required'
        ]);

        //========= Trip Details============//
        $tripid = $request->tripid;
        $journeydate = $request->journeydate;
        $from = $request->from;
        $to = $request->to;
        $deperturetime = $request->deperturetime;
        $busfare = $request->busfare;
        //==============================//

        //=========Getting Customer Name & Phone For Ticket Booking==========//
        $customername = $request->customername;
        $customerphone = $request->customerphone;
        //==============================//
        
        //======Customer Selected Seats & Seats Total Fare=========//
        $pickedseats = $request->input('seat');
        $totalbusfare = $busfare * (count($pickedseats));
        //==================================================//

        $bookedseatlist = ''; //Storing seats selected by user 
        $seatids = array(); // For Updating seat status getting seat id
        foreach($pickedseats as $seat){

            $arr = explode(' ',$seat); //Separating each seat id & seat number           
            $seatids[] = $arr[0]; // Storing multiple Seat Id from Array
            $seatnumbers = $arr[1]; // Storing The Seat Number from Array          
            $bookedseatlist .= $seatnumbers." "; //Storing The Seat Number as a String
        }
       
        
        foreach($seatids as $seatid){            
            SeatAllocation::where('id',$seatid)->update(['seat_status'=>'Booked']); //Updating the seat status = "Booked" for every selected seats
        }

        //=============Updating the Available Remaining seats for the Trip=============//

        $tripavailableseats = Trip::select('available_seats')->where('id',$tripid)->get();
        $availableseat = 0;
        foreach($tripavailableseats as $seat){

            $availableseat += $seat->available_seats; //Getting Available Seats
        }
        $remainingseat = $availableseat - (count($pickedseats));

        //====================================================================//
            
        
        //=============updating available seats=========//

        Trip::where('id',$tripid)->update(['available_seats'=>$remainingseat]);

        //==============================================//

        //===================Inserting user info for new or old user============//

        User::updateOrcreate(['customer_phone'=>$customerphone,'customer_name'=>$customername]);

        //=======================================================//       
    
        return view('pages.ticketpurchasedetails',[
            'journeydate'=>$journeydate,
            'from'=>$from,
            'to'=>$to,
            'deperturetime'=>$deperturetime,
            'busfare'=>$busfare,
            'customername'=>$customername,
            'customerphone'=>$customerphone,
            'bookedseats'=>$bookedseatlist,
            'totalfare'=>$totalbusfare]);
    }














}
