@extends('layouts.app')

@section('content')

<div class="deal-main">
  <div class="dealmain-list">

    @foreach($data as $user)
    <div class="dealmain-item">

      <p id ="heading">{{$user->heading}}</p>

      <div class="dealmainItem-list">

        <div class="dealmainItem-item">

          <h1> {{$user->name}} </h1>
          <h3> {{$user->description}} </h3>
          <h3> {{$user->offer}} </h3>
          <h1 id="price"> ${{$user->price}} </h1>

        </div>

        <div class="dealmainItem-img">

          <img src="{{ asset('/public/img/' . $user->image) }}">
          


        </div>



      </div>

    </div>
    @endforeach

  </div>







</div>













@endsection