@extends('layouts.app') 
@section('title', '| ACCESS POINT') 
@section('orgs-stylesheets')
<link rel="stylesheet" href="css/orgs.css" type="text/css"> 
@stop 
@section('content') 
    @include('inc.navbar')
<div id="accessPointHeader">
    <span>
        <img src="assets/imgs/logo/theaccesspoint_logo.png" alt="Access Point's Logo" class="img-fluid rounded-circle">
    </span>
    <br>
    <br>
    <br>
    <h1 class="txt">
        <br/>The Access Point</h1>
    <h2 class="ptxt">&bull; THE OFFICIAL PUBLICATION OF THE CICT &bull;</h2><br><br><br><br>
</div>

<div id="main">

    <header class="major container 75%">
        <h2 class="txt">Sample text here
            <br />Sample text here
            <br />
        </h2>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <img src="assets/imgs/orgs/codegeeks_cover.png" alt="CodeGeeks Members" class="img-fluid">
            </div>
            <div class="col-md-7">

                <h1 class="txt accesspoint-color">
                    THE ACCESS Point
                </h1>

                <div>
                    <hr class="hrO">
                    <br>
                    <br>
                    <br>
                    <p class="ptxt">
                        The Access Point is the official student publication of the College of Information and Communications Technology. "We're
                        here to provide you information on what's happening in the campus and around the college." - Hannah
                        Manalili, Editor-in-Chief of The Access Point

                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="major container 75%">
        <h3 class="header-post accesspoint-color">ACCESS POINT MEMBERS</h3>
        <hr class="accesspoint-hr">
        <div class="row">

            @if(count($users)>0) 
            @foreach($users as $users1) 
            @if($users1->role == 'AccessPoint')
            <div class="col-md-3">
                <img class="img-fluid" src="/storage/cover_images/{{$users1->cover_image}}" alt="" height="200px" width="200px">
                <br>
                <br>

                <h3>Name:
                    <span class="accesspoint-color">{{$users1->title}}</span>
                </h3>
                <h5>Position:
                    <span class="accesspoint-color">{{$users1->body}}</span>
                </h5>
            </div>
            <br> 
            @endif 
            @endforeach
            @else
            <p>No posts found</p>
            @endif
        </div>
    </section>
    <section class="major container 75%">
        <h3 class="accesspoint-color header-post">ACCESS POINT POST</h3>
        <hr class="accesspoint-hr"> 
        @if(count($accesspoint)>0) 
        @foreach($accesspoint as $accesspoint1) 
        @if($accesspoint1->role == 'AccessPoint')
            <div class="row">
                 <div class="col-md-6 text-center">
                <br>
                <br>
                <a href="/accesspoint/{{$accesspoint1->id}}">
                    <img class="img-fluid post-img wow animated fadeIn" src="/storage/cover_images/{{$accesspoint1->cover_image}}"
                        alt="">
                </a>
            </div>
            <div class="col-md-6 text-left">
                <br>
                <br>
                <br>
                <h3 class="accesspoint-color post-title">
                    <i>"{{$accesspoint1->title}}"</i>
                </h3><br>
                <h6>{!!$accesspoint1->body!!}</h6><br><br>
                <p>POSTED ON:
                    <span class="accesspoint-color">{{$accesspoint1->created_at}}</span>
                </p>
                <p>BY:
                    <span class="accesspoint-color">{{$accesspoint1->user->name}}</span>
                </p>
                <p>ORGANIZATION:
                    <span class="accesspoint-color">{{$accesspoint1->role}}</span>
                </p>
            </div>
        </div>
        <br> 
        @endif 
        @endforeach 
        @else
        <p>No posts found</p>
        @endif
    </section>
</div>

<!-- Footer -->
<div id="accessPointFooter">
    <div class="container 75%">

        <header class="major last">
            <h2>Lorem Ipsum</h2>
        </header>

        <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum
            fermentum etiam vivamus.</p>

        <ul class="icons">
            <li>
                <a href="#" class="icon fa-twitter">
                    <span class="label">Twitter</span>
                </a>
            </li>
            <li>
                <a href="#" class="icon fa-facebook">
                    <span class="label">Facebook</span>
                </a>
            </li>
            <li>
                <a href="#" class="icon fa-instagram">
                    <span class="label">Instagram</span>
                </a>
            </li>
            <li>
                <a href="#" class="icon fa-github">
                    <span class="label">Github</span>
                </a>
            </li>
            <li>
                <a href="#" class="icon fa-dribbble">
                    <span class="label">Dribbble</span>
                </a>
            </li>
        </ul>

        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li>
            <li>Design:
                <a href="http://html5up.net">Projman</a>
            </li>
        </ul>

    </div>
</div>
@stop