@extends('layouts.app')

@section('content')

@if(Session::has('prodAddedmsg'))

  <p class="btn btn-success"> Product added to cart </p>

@elseif(Session::has('proddeletemsg'))

  <p class="btn btn-danger"> Product deleted from cart </p>

@endif 


<div class="container">
  @if($productCount == 0)

    <p> Empty cart </p>

  @else

  <table class="table">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Free Toppings </th>
        <th>Paid Toppings </th>
        <th>Total item price </th>
        <th> Delete </th>
      </tr>
    </thead>
    <tbody>
    

   

    @foreach($cartData as $cartData)
      <tr>
        
        <td>{{ $cartData->name }}</td>
        <td>{{ $cartData->price }}</td>
        <td>{{ $cartData->quantity }}</td>
        <td> {{ $cartData->free_toppings }}</td>
        <td> {{ $cartData->paid_toppings }}</td>
        <td> <?php $totalPrice = ($cartData->price * $cartData->quantity) + $cartData->paid_toppingsPrice; 
                    echo $totalPrice;

            ?> 
        </td>
        <td> <a href="/delete-product/{{ $cartData->id }}" role="button" class="btn btn-danger"> Delete </a> </td>
      </tr>

      

    @endforeach


    <tr><td>  Grand = {{ $grandTotal }}  </td></tr>

    <a href="/place-order" role="button" class="btn btn-success">Place order </a>

  @endif
    </tbody>
  </table>
</div>









@endsection