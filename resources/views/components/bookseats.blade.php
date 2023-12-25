<div style="text-align: center">

  <h3>BOOK YOUR SEATS</h3>
  <h4>Journey Date: {{$journeydate}} |||| From: {{$from}} |||| To: {{$to}} |||| Deperture Time: {{$deperturetime}} |||| Seat Fare: {{$busfare}}-/taka.<br> 
  </h4>
   
  <form action="{{route('buyseats',['tripid'=>$tripid,'journeydate'=>$journeydate,'from'=>$from,'to'=>$to,'deperturetime'=>$deperturetime,'busfare'=>$busfare])}}" method="POST">
    @csrf
  <label for="customername"><strong>Enter Customer Name</strong></label><br>
  <input type="text" name="customername"><br><br>
  @error('customername')
  <span style="color: red">{{$message}}</span><br><br>
  @enderror
  <label for="customerphone"><strong>Enter Customer Phone</strong></label><br>
  <input type="text" name="customerphone"><br><br> 
  @error('customerphone')
  <span style="color: red">{{$message}}</span><br>
  @enderror

  <h4>Choose Your Seat Below</h4>

  <table style="text-align:center; border:3px solid blue; margin: 0 auto;">
    <th style="text-align: center; border: 1px solid blue;" colspan="4">BUS SEAT PLAN</th>
    <tr>
      <td style="border: 2px solid blue;">Door</td>
      <td></td>
      <td></td>
      <td style="border: 2px solid blue; padding: 10px">Bus Driver</td>
    </tr>
    <tr>
      @for ($i=0; $i < 4; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue; padding: 4px 10px">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=4; $i < 8; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue; padding: 4px 10px">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=8; $i < 12; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=12; $i < 16; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=16; $i < 20; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=20; $i < 24; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=24; $i < 28; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=28; $i < 32; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
    <tr>
      @for ($i=32; $i < 36; $i++)
      @if($journeydate == $allseats[$i]->journey_date && $from == $allseats[$i]->from && $to == $allseats[$i]->to && $deperturetime == $allseats[$i]->deperture_time )
      <td style="border: 1px solid blue;">
        @if($allseats[$i]->seat_status == 'Available')
        <input type="checkbox" name="seat[]" id="" value="{{$allseats[$i]->id}} A{{$allseats[$i]->seat_number}}">A{{$allseats[$i]->seat_number}}<p style="color: green">{{$allseats[$i]->seat_status}}</p>
        @elseif ($allseats[$i]->seat_status == 'Booked')
        <input type="checkbox" name="" id="" disabled>A{{$allseats[$i]->seat_number}}<p style="color: red">{{$allseats[$i]->seat_status}}</p>
        @endif
      </td>
      @endif      
      @endfor
    </tr>
   
    
  </table>
  @error('seat')
  <br><span style="color: red">{{$message}}</span><br>
  @enderror
  <br><button type="submit">Buy Ticket</button>
</form>

  
<br><br>

  <a href="{{route('findtrip')}}">GO BACK</a>

 
</div>