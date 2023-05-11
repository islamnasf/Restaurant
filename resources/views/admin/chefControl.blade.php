@extends('admin.adminHome')
@section('main')
<div style="padding-right:70px; ">
<a href="#chefs" class="btn btn-success"style="padding:15px;">CHEFS</a>
</div>
<div style=" width:50%">
<form action="{{url('chef_Control')}}" method="Post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
  </div>
  <div class="form-group">
    <label>speciality</label>
    <input type="text" class="form-control" name="speciality" id="speciality" placeholder="speciality" required>
  </div>
  <div class="form-group">
    <label >Image</label>
    <input type="file" class="form-control" id="image" name="image" required>
  </div>
  <button type="submit" class="btn btn-success">Save</button>
  </div>
</form> 
</div>
</div>

<div style="width:60%; margin:0 auto; padding-bottom:200px;" id="chefs">
<table class="table" style="height:300px;" >
  <thead >
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Speciality</th>
      <th scope="col">Action(1)</th>
      <th scope="col">Action(2)</th>


    </tr>
  </thead>
  <tbody>
    @foreach($data as $info)
    <tr>
      <td>{{$info->name}}</td>
      <td><img src="chefimage/{{$info->image}}" style="width:60%;  height:70px"></td>
           
         <td>{{$info->speciality}}</td>
      <td>
        <a href="{{url('deletechef',$info->id)}}" class="btn btn-sm btn-danger">Delete</a>  
    </td>
    <td>
        <a href="{{url('updatechef',$info->id)}}" class="btn btn-sm btn-warning">Update</a>  
    </td>
    </tr>
    @endforeach

  </tbody>

</table>

</div>

@endsection
