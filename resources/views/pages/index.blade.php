@extends('layouts.app') 
@section('title', '| HOME') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.navbar')
<div class="header text-center">
    <img src="assets/imgs/logo/cict-logo.png" class="img-fluid login-logo wow animated fadeIn" data-wow-delay="0.5s" height="300px"
        width="300px">
    <h1 class="white animated fadeIn">HOLY ANGEL UNIVERSITY</h1>
    <h3 class="orange animated fadeIn">COLLEGE OF INFORMATION COMMUNICATION &amp; TECHNOLOGY</h3>
</div>
<div id="video-container">
    <video autoplay muted loop id="myVideo">
        <source src="assets/imgs/header-video.mp4" type="video/mp4"> Your browser does not support HTML5 video.
    </video>
</div>
<div class="container-fluid bg">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="border-highlight wow animated fadeInLeft"></div>
            <h1 class="lastestPost">
                <span class="white">LATEST</span>
                <span class="orange">POST</span>
            </h1>
            <div class="border-highlight wow animated fadeInRight"></div>
            <br>
            <br>
            <br>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row">
                @foreach($posts as $posts1) 
                @if ($loop->iteration % 2 == 0)
                <div class="col-md-6 text-center">
                    <div class=""><br>
                        <img src="/storage/cover_images/{{$posts1->cover_image}}" class="img-fluid post-img wow animated fadeIn" height="300px" width="300px">
                    </div><br><br><br><br>
                    <hr class="hr">
                </div>
                <div class="col-md-6">
                    <section class="wow animated fadeIn" data-wow-delay="0.5s">
                        <h1 class="orange">"{{$posts1->title}}"</h1>
                        <p class="white">{!!$posts1->body!!}</p>
                        <p class="white">POSTED BY: <span class="orange">{{$posts1->role}}</span><br>POSTED ON: <span class="orange">{{$posts1->created_at}}</p>
                        @if($posts1->role == 'Faculty')
                        <a href="/article" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'Igoara')
                        <a href="/igoara" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'Cisco')
                        <a href="/cisco" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'AccessPoint')
                        <a href="/accesspoint" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'Loop')
                        <a href="/loops" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'CodeGeeks')
                        <a href="/codegeeks" class="btn btn-warning">Read More</a>
                        @endif
                    </section>
                </div>
                @endif
                @if ($loop->iteration % 2 != 0)
                <div class="col-md-6 text-right">
                    <section class="wow animated fadeIn" data-wow-delay="0.5s">
                        <h1 class="orange">"{{$posts1->title}}"</h1>
                        <p class="white">{!!$posts1->body!!}</p>
                        <p class="white">POSTED BY: <span class="orange">{{$posts1->role}}</span><br>POSTED ON: <span class="orange">{{$posts1->created_at}}</p>
                        @if($posts1->role == 'Faculty')
                        <a href="/article" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'Igoara')
                        <a href="/igoara" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'Cisco')
                        <a href="/cisco" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'AccessPoint')
                        <a href="/accesspoint" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'Loop')
                        <a href="/loops" class="btn btn-warning">Read More</a>
                        @endif
                        @if($posts1->role == 'CodeGeeks')
                        <a href="/codegeeks" class="btn btn-warning">Read More</a>
                        @endif
                    </section>
                </div>
                <div class="col-md-6 text-center">
                    <div class=""><br>
                        <img src="/storage/cover_images/{{$posts1->cover_image}}" class="img-fluid post-img wow animated fadeIn" height="300px" width="300px">
                    </div><br><br><br><br>
                    <hr class="hr">
                </div>
                @endif
                @endforeach 
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
</div>
@include('inc._footer') @endsection