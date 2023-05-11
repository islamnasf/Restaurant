@extends('admin.adminHome')

@section('main')
<table class="table" style="height:200px;" >
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach($data as $info)
    <tr>
      <th >{{$info->id}}</th>
      <td>{{$info->name}}</td>
      <td>{{$info->email}}</td>
      <td>
@if($info->usertype==0)
        <a href="{{route('deleteuser',$info->id)}}" class="btn btn-sm btn-danger">Delete</a>  
        @else
        <span class=" alert-sm alert-info">Not Allwed</span>
        @endif


    </td>
    </tr>

    @endforeach

   
    
  </tbody>
</table>
@endsection
