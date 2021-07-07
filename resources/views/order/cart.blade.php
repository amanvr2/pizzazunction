@extends('layouts.app')

@section('content')

@if(Session::has('prodAddedmsg'))

  <div class="container">
    <div class="alert alert-success">
      Product added to cart
    </div>
  </div>

@elseif(Session::has('proddeletemsg'))

  <p class="btn btn-danger"> Product deleted from cart </p>

@elseif(Session::has('order-placed'))

  
  <div class="container">
      <div class="alert alert-success">
        Order Placed
      </div>
  </div>

@endif 


<div class="container">

  @if($productCount == 0)

    <div class="empty-cart">

      <p> Empty cart </p>

    </div>

  @else

  <div class="cart-table">

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


       
      

   
      </tbody>
    </table>
  </div>
  <div class="place-order">

  <a href="/place-order" role="button" class="btn btn-success">Place order for $ {{ $grandTotal }}</a>

</div>
  @endif 
</div>











@endsection