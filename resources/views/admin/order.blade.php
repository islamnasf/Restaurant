@extends('admin.adminHome')

@section('main')

<base href="/public" > <!-- دي عشان تهزر التنسيق ف كل الصفحات-->

<div style="width:60%; margin:0 auto;" id="food">
<table class="table" style="height:300px;" >
  <thead >
    <tr>
      <th scope="col">Food Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Total Price</th>

    </tr>
  </thead>
  <tbody>
    @foreach($data as $data)
    <tr>
      <td>{{$data -> foodname}}</td>
      <td>{{$data -> price}}</td>
      <td>{{$data -> quantity}}</td>
      <td>{{$data -> name}}</td>
      <td>{{$data -> phone}}</td>
      <td>{{$data -> address}}</td>
      <td>{{$data -> price *  $data -> quantity}}</td>

    </tr>
    @endforeach
  </tbody>
</table>


</div>


@endsection
