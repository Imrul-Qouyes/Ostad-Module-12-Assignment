<div style="text-align: center">
  <h2>Passenger Tickets Details</h2>
  <table style="width:50%; border:1px solid black; margin: 0 auto;">
    <th style="border:1px solid black;">Passenger Tickets Details</th>
    <tr style="border:1px solid black;">
      <td style="border:1px solid black; text-align:center"><h4 style="color:crimson">Journey Date: {{$journeydate}}<br>From: {{$from}}<br>To: {{$to}}<br>Deperture Time: {{$deperturetime}}<br>Seat Fare: {{$busfare}}-/</h4>
        <h4 style="color:green">Passenger Name: {{$customername}}<br>Passenger Phone: {{$customerphone}}<br>Booked Seats: <span style="color: red">{{$bookedseats}}</span><br>Total Fare: {{$totalfare}}-/</h4></td>
    </tr>
    <tr><td style="text-align: center"><button><a href="{{route('findtrip')}}">OK</a></button></td></tr>
  </table>
</div>