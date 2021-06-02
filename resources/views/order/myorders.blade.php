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
    @foreach($orderData as $data)

      <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->orderamount }}</td>
        <td>{{ $data->ordertime }}</td>
        <td><a href="/order-details/{{ $data->id }}" role="button" class="btn btn-warning">Details </a></td>
        
      </tr>


    @endforeach
    </tbody>
  </table>







@endsection