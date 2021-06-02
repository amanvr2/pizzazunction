@extends('layouts.app')

@section('content')

<div class="login">
 <div class="login-form">
    <i class="fa fa-sign-in" aria-hidden="true"></i>
    <h3>Sign In</h3><br>
    <form action="/admin-auth" class="form-group">                          
      @csrf                     

    
          <input id="name" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address*" value="{{ old('email') }}" required autocomplete="email" autofocus>

   
          <br>
 
          <input id="name" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password* " required autocomplete="current-password">

          <br>

        <button id="logbtn" type="submit"  class="btn btn-success">
          {{ __('Sign in') }} 
        </button>                         

    </form>

  </div>
      



</div>


@endsection
