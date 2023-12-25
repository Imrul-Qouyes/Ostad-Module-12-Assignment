<div style="text-align: center">
  <h4>Do you really want to delete?</h4>
  <form action="{{route('confirmremovelocation',['id'=>$id])}}" method="POST">
    @csrf
    <button type="submit">OK</button>
    <button><a href="{{route('alllocation')}}">Cancel</a></button>
  </form>
</div>