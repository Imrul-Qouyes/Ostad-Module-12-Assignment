<div style="text-align: center">
  <table style="width:50%; border: 1px solid black; margin: 0 auto;">
    <th style="border: 1px solid black">Id</th>
    <th style="border: 1px solid black">Location Name</th>
    <th style="border: 1px solid black">Action</th>
   
    @foreach ($results as $item)      
    <tr style="border: 1px solid black">
      <td style="border: 1px solid black">{{$item->id}}</td>
      <td style="border: 1px solid black">{{$item->locationName}}</td>
      <td style="border: 1px solid black"><a href="{{route('removelocation',['id'=>$item->id])}}">Delete</a></td>
    </tr>
    @endforeach

  </table>
  @if (session()->has('success'))  
  <br><span style="color: green"> {{session()->get('success')}}.</span><br>
  @endif
  <br><br><a href="{{route('bustrip')}}">GO BACK</a>
</div>