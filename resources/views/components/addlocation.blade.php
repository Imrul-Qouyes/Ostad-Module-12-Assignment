<div style="text-align: center">

  <form action="{{route('addlocation')}}" method="post">
    @csrf
    <label for="triplocation"><strong>Enter Trip Location</strong></label><br>
    <input type="text" name="triplocation"><br><br>
    @error('triplocation')
    <span style="color: red">{{$message}}.</span><br><br>
    @enderror
    @if (session()->has('success'))   
    <span style="color: green"> {{session()->get('success')}}.</span><br><br>
    @endif 
    <button type="submit">ADD</button><br>    
  </form>
 
  <br><a href="{{route('bustrip')}}">GO BACK</a>
</div>