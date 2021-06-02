@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Newsletter</th>
      </tr>
    </thead>

    @foreach($data as $user)

    <tbody>
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->number }}</td>
        <td>{{ $user->email }}</td>
        <td>{{$user->address }} </td>
        <td> {{ $user->newsletter }} </td>

      </tr>
      
    </tbody>






    @endforeach



  </table>


</div>






@endsection