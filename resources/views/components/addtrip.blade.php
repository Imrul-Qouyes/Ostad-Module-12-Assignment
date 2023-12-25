<div style="text-align: center">
  <form action="{{route('confirmtrip')}}" method="POST">
    @csrf
    <label for="journeydate">Journey Date</label>
    <input type="date" name="journeydate" id=""><br><br>
    @error('journeydate')
      <span style="color: red">{{$message}}.</span><br><br>
    @enderror
    <label for="from">From</label>
    <select name="from" id="">
      @foreach ($results as $item)        
      <option name="from" value="{{$item->locationName}}">{{$item->locationName}}</option>
      @endforeach
    </select><br><br>
    <label for="to">To</label>
    <select name="to" id="">
      @foreach ($results as $item)        
      <option name="to" value="{{$item->locationName}}">{{$item->locationName}}</option>
      @endforeach
    </select><br><br>
    <label for="deperturetime">Deperture Time</label>
    <input type="time" name="deperturetime" id=""><br><br>
    @error('deperturetime')
    <span style="color: red">{{$message}}.</span><br><br>
    @enderror
    <label for="availableseats">Available Seats</label>
    <input type="text" name="availableseats" id="" value="36" readonly><br><br>
    <label for="busfare">Bus Fare</label>
    <input type="text" name="busfare" id=""><br><br>
    @error('busfare')
    <span style="color: red">{{$message}}.</span><br><br>
    @enderror
    <button type="submit">Create Trip</button><br><br>
  </form>
  @if(session()->has('success'))
  <span style="color: green">{{session()->get('success')}}</span><br>  
  @endif
  @if (session()->has('err'))  
  <span style="color: red"> {{session()->get('err')}}.</span><br><br>   
  @endif    

  <br><a href="{{route('bustrip')}}">GO BACK</a>
</div>