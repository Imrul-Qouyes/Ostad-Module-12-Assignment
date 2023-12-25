<div style="text-align: center">

  <table style="width:100%; border: 1px solid black">
    <th style="border: 1px solid black">Journey Date</th>
    <th style="border: 1px solid black">From</th>
    <th style="border: 1px solid black">To</th>
    <th style="border: 1px solid black">Deperture Time</th>
    <th style="border: 1px solid black">Available Seats</th>
    <th style="border: 1px solid black">Seat Fare</th>
    <th style="border: 1px solid black">Action</th>

    @foreach ($searchedresults as $item)      
    <tr>
      <td style="border: 1px solid black; text-align: center">{{$item->journey_date}}</td>
      <td style="border: 1px solid black; text-align: center">{{$item->from}}</td>
      <td style="border: 1px solid black; text-align: center">{{$item->to}}</td>
      <td style="border: 1px solid black; text-align: center">{{$item->deperture_time}}</td>
      <td style="border: 1px solid black; text-align: center">{{$item->available_seats}}</td>
      <td style="border: 1px solid black; text-align: center">{{$item->bus_fare}}</td>
      <td style="border: 1px solid black; text-align: center">
      <a href="{{route('bookseats',['tripid'=>$item->id,
      'journeydate'=>$item->journey_date,
      'from'=>$item->from,
      'to'=>$item->to,
      'deperturetime'=>$item->deperture_time,
      'busfare'=>$item->bus_fare])}}">Book Seats</a>
      </td>
    </tr>
    @endforeach

  </table>
  @if($searchedresults == []) 
  <br><span style="color: red">{{$notripfound}}</span><br>
  @endif

  
<br><a href="{{route('findtrip')}}">GO BACK</a>
</div>