@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th> OrderId </th>
        <th>Order Amount</th>
        <th>Order Time</th>
        <th>Details </th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data as $data)

      <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->orderamount }}</td>
        <td>{{ $data->ordertime }}</td>
        <td><a href="/orderDetails/{{ $data->id }}" role="button" class="btn btn-warning">Details </a></td>
        
      </tr>


    @endforeach
    </tbody>
  </table>







@endsection