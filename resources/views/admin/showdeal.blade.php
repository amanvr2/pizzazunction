@extends('layouts.app')

@section('content')

  
<div class="form">

  <div class="form-sub">

    <h2> Edit Deal  </h2>
         
    <br>
    @foreach($data as $user)

    <form action="/edit-deal/{{ $user->id }}" class="form-group" method="POST" enctype="multipart/form-data" > 
        
      @csrf
        
      <label> Deal Heading </label>        
      <input type= "text" name="heading" class="form-control" value=" {{ $user->heading }}" >
      <br>
      
      <label> Product Name</label>
      <input type= "text" name="name" class="form-control" value=" {{ $user->name }}" >

      <br>
      <label> Description </label>
      <input type= "text" name="description" class="form-control" value=" {{ $user->description }}" >

      <br>
      <label> Price </label>
      <input type= "text" name="price" class="form-control" value=" {{ $user->price }}" >

      <br>
      <label>Offer(if any)</label>
      <input type= "text" name="offer" class="form-control" value=" {{ $user->offer }}" >

      <br>

      <label>Image</label><br>

      <img src="{{ asset('/public/img/' . $user->image) }}" height="100" width="100"><br><br>
      <input type= "file" name="image" class="form-control" >

      <br>

  
      <button type="submit" name="submit" id="btn" class="btn btn-warning">Submit </button>
        
        
        
        
        
        
    </form>
  @endforeach
  </div>
        
</div>













@endsection