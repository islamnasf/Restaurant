@extends('admin.adminHome')
@section('main')
<div style="padding-right:70px; ">
<a href="#food" class="btn btn-success"style="padding:15px;">FOOD</a>
</div>
<div style=" width:50%">
<form action="{{url('/uploadfood')}}" method="Post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="title" required>
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="price" required>
  </div>
  <div class="form-group">
    <label >Image</label>
    <input type="file" class="form-control" id="image" name="image" required>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea type="textarea" class="form-control" name="description" id="description" placeholder="description" rows="3" required></textarea>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-success">Save</button>
  </div>


</form> 
</div>
</div>

<div style="width:60%; margin:0 auto;" id="food">
<table class="table" style="height:300px;" >
  <thead >
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action(1)</th>
      <th scope="col">Action(2)</th>


    </tr>
  </thead>
  <tbody>
@foreach($data as $info)
    <tr>
      <td>{{$info->title}}</td>
      <td>{{$info->price}}</td>
      <td>{{$info->description}}</td>
      <td><img src="foodimage/{{$info->image}}" style="width:60%; margin:0; height:70px"></td>
      <td>
        <a href="{{url('deletefood', $info->id)}}" class="btn btn-sm btn-danger">Delete</a>  
    </td>
    <td>
        <a href="{{url('updatefood', $info->id)}}" class="btn btn-sm btn-warning">Update</a>  
    </td>
    </tr>

  @endforeach
  </tbody>

</table>
    <div style="margin:30px;"> {{$data->links()}} </div>

</div>

@endsection
