@extends('admin.adminHome')
@section('main')
<base href="/public" > <!-- دي عشان تهزر التنسيق ف كل الصفحات-->
<div style=" width:50%">
<form action="{{url('updatechefdata',$data->id)}}" method="Post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" name="speciality" id="speciality" value="{{$data->speciality}}">
  </div>
  <div class="form-group">
  <label>Image</label>

    <img height="200" width="200" src="chefimage/{{$data->image}}"  >
  </div>
  <div class="form-group">
    <label >New Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-success">update</button>
  </div>
</form> 
</div>
</div>

@endsection
