@extends('layouts.app')
@section('title', '| ADD ACCOUNT') 
 @section('main-stylesheets')
 <link rel="stylesheet" href="css/main.css" type="text/css">
 @stop
@section('content')
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">ADD ACCOUNT</span>
                </h1>
                <br>
                <br>
                
                <form class="form" method="POST">
                    @csrf
                @if ($errors->has('role'))
                                <div class="text-center error-span wow animated fadeDown" data-wow-delay="0.5s">
                                    <span class="white invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    </div><br>
                                @endif
                @if ($errors->has('name'))
                                <div class="text-center error-span wow animated fadeDown" data-wow-delay="0.5s">
                                    <span class="white invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    </div><br>
                                @endif
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
                    <div class="form-group text-center row">
                        <div class="col-md-2">
                            <img src="assets/imgs/prof.png" class="img-fluid rounded-circle" height="200px" width="200px">
                            <input id="role" type="radio" value="Faculty"  name="role"  required autofocus><span class="orange">FACULTY MEMBER</span>
                        </div>
                        <div class="col-md-2">
                            <img src="assets/imgs/logo/theaccesspoint_logo.png" class="img-fluid rounded-circle" height="200px" width="200px">
                            <input id="role" type="radio" value="AccessPoint"  name="role"  required autofocus><span class="orange">ACCESS POINT</span>
                        </div>
                        <div class="col-md-2">
                            <img src="assets/imgs/logo/cisco_logo.jpg" class="img-fluid rounded-circle" height="200px" width="200px">
                            <input id="role" type="radio" value="Cisco"  name="role"  required autofocus><span class="orange">CISCO</span>
                        </div>
                        <div class="col-md-2">
                            <img src="assets/imgs/logo/codegeeks_logo.jpg" class="img-fluid rounded-circle" height="200px" width="200px">
                            <input id="role" type="radio" value="CodeGeeks"  name="role"  required autofocus><span class="orange">CODEGEEKS</span>
                        </div>
                        <div class="col-md-2">
                            <img src="assets/imgs/logo/igoara_logo.jpg" class="img-fluid rounded-circle" height="200px" width="200px">
                            <input id="role" type="radio" value="Igoara"  name="role"  required autofocus><span class="orange">IGOARA</span>
                        </div>
                        <div class="col-md-2">
                            <img src="assets/imgs/logo/loop_logo.png" class="img-fluid rounded-circle" height="200px" width="200px">
                            <input id="role" type="radio" value="Loop"  name="role"  required autofocus><span class="orange">LOOP</span>
                        </div>
                    </div><br><br>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            <h5 class="orange">
                                <i class="fa fa-id-badge"></i> Name</h5>
                        </label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="register-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Account Name" required autofocus> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">
                            <h5 class="orange">
                                <i class="fa fa-envelope"></i> Email</h5>
                        </label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="register-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email" required> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">
                            <h5 class="orange">
                                <i class="fa fa-lock"></i> Password</h5>
                        </label>
                        <div class="col-md-6">
                            <input id="password" type="password" id="password"  class="register-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" pattern=".{6,}" placeholder="Enter Password" required title="6 characters minimum"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                            <h5 class="orange">
                                <i class="fa fa-lock"></i> Confirm Password</h5>
                        </label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" id="confirm_password" class="register-input form-control" name="password_confirmation" pattern=".{6,}" placeholder="Enter Password" required title="6 characters minimum"> 
                        </div>
                    </div><br><br>
                    <div class="form-group text-right">
                        <button type="submit" class="btn-login"><i class="fa fa-plus"></i> ADD ACCOUNT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
