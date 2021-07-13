@extends('layouts.app')

@section('content')
<div class="login">
    <div class="login-form">
        <i class="fa fa-user-plus" aria-hidden="true"></i>
        <h3>Sign Up </h3> <br> 

        <form method="POST" action="{{ route('register') }}">
            @csrf
        
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name"> 

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <br>
                
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            <br>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                
            <br> 

            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>

            <br><br>

            <a href="/login"> Already a user ? Log In </a>
            
        </form>
                
    </div> 
</div>
@endsection
