@extends('admin.adminHome')
@section('main')
<base href="/public" > <!-- دي عشان تهزر التنسيق ف كل الصفحات-->
<div style="width:60%; margin:0 auto;">
<table class="table" style="height:300px;" >
  <thead >
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Guest</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>



    </tr>
  </thead>
  <tbody>
@foreach($data as $info)
    <tr>
      <td>{{$info->name}}</td>
      <td>{{$info->email}}</td>
      <td>{{$info->phone}}</td>
      <td>{{$info->guest}}</td>
      <td>{{$info->date}}</td>
      <td>{{$info->time}}</td>
      <td>{{$info->message}}</td>
      <td>
      <a href="{{url('deletereservation', $info->id)}}" class="btn btn-sm btn-danger">Delete</a>  
      </td>
    </tr>
  @endforeach
  </tbody>

</table>

</div>
 
@endsection  
