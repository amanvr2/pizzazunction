@extends('layouts.app')

@section('content')

  
    <div class="container">
      @if(Session::has('updated'))
        <p class="alert alert-success">Deal Updated Successfully !</p>

      @elseif(Session::has('deleted'))
        <p class="alert alert-success">Deal Deleted Successfully !</p>

      @endif
    </div>
    <div class="deal">
   

      <div class="deal-list">
        @foreach($data as $user)
        <div class="deal-item">

          <div class="dealItem-list">

            <div class="dealItem-item">
              <img src="{{ asset('/public/img/' . $user->image) }}">

            </div>
            
            <div class="dealItem-item">

              <h3> {{$user->heading}} </h3>
              <p> {{$user->name}} </p>  
              <p> {{$user->description}} </p>
              <p> $ {{$user->price}} </p> 
              <p> {{$user->offer}} </p>
              

            </div> 

            <div class="dealItem-item">

              <a href="/show-deal/{{ $user->id }}" role="button" class="btn btn-primary">Edit </a>

            </div>

            <div class="dealItem-item">

              <a href="/delete-deal/{{ $user->id }}" role="button" class="btn btn-danger">Delete </a>

            </div>


          </div>
        </div>
         @endforeach
      </div>
    </div>




 














@endsection