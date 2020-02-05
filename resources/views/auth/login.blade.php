@extends('layouts.app') 
@section('title', '| LOGIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content')
<div id="loginForm">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-6 text-center">
                <br><br><br>
                <img src="/assets/imgs/logo/cict-logo.png" class="img-fluid login-logo" height="220px" width="220px">
            </div>
            <div class="col-md-6">
                <h1 class="text-center">
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">LOGIN</span>
                </h1>
                <br>
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($errors->has('email'))
                    <div class="text-center error-span wow animated fadeDown" data-wow-delay="0.5s">
                        <span class="white invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div><br>
                        @endif
                    @if ($errors->has('password'))
                    <div class="text-center error-span wow animated fadeDown" data-wow-delay="0.5s">
                            <span class="white invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        </div><br>
                            @endif
                    <div class="form-group">
                        <label for="email">
                            <h5 class="orange">
                                <i class="fa fa-envelope"></i> Email</h5>
                        </label>
                        <input type="text" class="login-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" 
                            required autofocus> 
                    </div>
                    <br>
                        <div class="form-group">
                            <label for="password">
                                <h5 class="orange">
                                    <i class="fa fa-lock"></i> Password</h5>
                            </label>
                            <input type="password" class="login-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required> 
                        </div><br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn-login">LOGIN <i class="fa fa-sign-in"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection