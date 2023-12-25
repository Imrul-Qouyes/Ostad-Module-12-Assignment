<div style="text-align: center">
  <form action="{{route('searchtrip')}}" method="POST">
    @csrf
    <label for="searchtrip"><strong>Search Trip</strong></label><br><br>
    <input type="date" name="searchtrip" id=""><br><br>
    @error('searchtrip')
      <span style="color: red">{{$message}}</span><br><br>
    @enderror
    <button type="submit">Search</button>
  </form>

  
  <br><a href="{{route('home')}}">GO BACK</a>
</div>