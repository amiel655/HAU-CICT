@extends('layouts.app') 
@section('title', '| ADMIN') 
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
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">ADMIN</span>
                </h1>
            </div>  
            <div class="col-md-12 text-center">
                <img src="/assets/imgs/logo/cict-logo.png" class="img-fluid login-logo" height="220px" width="220px">
                <br><br>
                <h3><span class="white">WELCOME ADMIN:</span> <span class="orange">{{ Auth::user()->name }}</span></h3>
                <h5><i class="fa fa-firefox orange"></i> FOR THE FOXES</h5>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
