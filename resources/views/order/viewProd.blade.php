@extends('layouts.app')

@section('content')


@foreach($data as $dat)

<div class="container">

    <h2> Selected Preferences </h2> 

    <label>Quantity - {{ $dat->quantity}} </label>
    <br>

    <label>Toppings -  {{ $dat->free_toppings }}</label><br>

    <label>Paid Toppings - {{$dat->paid_toppings}} </label>


   
</div>
 

<div class="changes">

    <h3>Edit Order </h3>

    <form action= "/editcart-product/{{ $dat->id }}" class="form-group">


        @csrf

        <label> Quantity </label><br>
        <select name="quantity" class="form-control">

        @for($i=1;$i < 50;$i++)

        <option value = {{ $i }} > {{ $i }}</option>

        @endfor
        </select>

        <h2> Change Toppings </h2>
        <h5>You can select upto 4 toppings </h5>

        @foreach($toppings as $data)

            <input type="checkbox" name="toppings[]" value="{{$data->name}}" >
            &nbsp &nbsp<label>{{$data->name}}</label><br>

        @endforeach 

        <h4>Additional Toppings </h4>

        @foreach($toppings as $data)
            <input type="checkbox" name="addtoppings[]" value="{{$data->name}}">
            &nbsp &nbsp<label>{{$data->name}} + ${{$data->price}}</label><br>
        
        @endforeach 

        <button type="submit" class = "btn btn-primary">Update</button>

    </form>


</div>

@endforeach


@endsection