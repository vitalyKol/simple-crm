<form action="{{$link}}" method="POST" class="d-inline">
    @csrf
    @method("DELETE")
    <input type="submit" class="btn btn-danger" value="Delete">
</form>
