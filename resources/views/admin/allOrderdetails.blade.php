@extends('layouts.app')

@section('content')


  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity </th>
        <th>Free Toppings </th>
        <th>Paid Toppings </th>
        <th>Total item price </th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($orderItems as $data)

      <tr>
        <td>{{ $data->name }}</td>
        <td>{{ $data->price }}</td>
        <td>{{ $data->quantity }}</td>
        <td> {{ $data->free_toppings }}</td>
        <td> {{ $data->paid_toppings }}</td>
        <td> <?php $totalPrice = ($data->price * $data->quantity) + $data->paid_toppingsPrice; 
                    echo $totalPrice;

            ?> 
     
        
      </tr>


    @endforeach
    </tbody>
  </table>

  <h2>Customer data</h2>

  @foreach($customerData as $customer)

    <p>{{$customer->name}}</p>
    <p>{{$customer->email}}</p>
    <p>{{$customer->number}}</p>
    <p>{{$customer->address}}</p>

   @endforeach

   









@endsection