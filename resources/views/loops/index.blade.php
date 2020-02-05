@extends('layouts.app') 
@section('title', '| LOOP') 
@section('orgs-stylesheets')
<link rel="stylesheet" href="css/orgs.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.navbar')
<div id="loopHeader">
    <span>
        <img src="assets/imgs/logo/loop_logo.png" alt="Loop's Logo" class="img-fluid rounded-circle">
    </span>
    <h1 class="txt">
        <br/>LEAGUE OF OUTSTANDING PROGRAMMERS</h1>
    <h2 class="ptxt">&bull; COMPUTER SCIENCE &bull;</h2>
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
                <img src="assets/imgs/orgs/loop_cover.png" alt="Loop Members" class="img-fluid">
            </div>
            <div class="col-md-7">

                <h1 class="txt loop-color">
                    LEAGUE OF OUTSTANDING PROGRAMMERS
                </h1>

                <div>
                    <hr class="hrO">
                    <br>
                    <br>
                    <br>S
                    <p class="ptxt">
                        The League Of Outstanding Programmers (LOOP) is the democratic and representative student society of Computer Science students
                        in Holy Angel University.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="major container 75%">
        <h3 class="header-post loop-color">LOOP MEMBERS</h3>
        <hr class="loop-hr">
        <div class="row">
        @if(count($users)>0) 
        @foreach($users as $users1) 
        @if($users1->role == 'Loop')
                <div class="col-md-3">

                     <img class="img-fluid" src="/storage/cover_images/{{$users1->cover_image}}" alt="" height="200px" width="200px">
                <br>
                <br>

                <h3>Name:
                    <span class="loop-color">{{$users1->title}}</span>
                </h3>
                <h5>Position:
                    <span class="loop-color">{{$users1->body}}</span>
                </h5>
        </div>
        <br> 
        @endif 
        @endforeach 
        @else
        <p>No posts found</p>
        @endif
    </section>
    <section class="major container 75%">
         <h3 class="loop-color header-post">LOOP POSTS</h3>
        <hr class="loop-hr"> 
        @if(count($loops)>0)
        @foreach($loops as $loops1) 
        @if($loops1->role == 'Loop')
            <div class="row">

                <div class="col-md-6 text-center">
                <br>
                <br>
                <a href="/loop/{{$loops1->id}}">
                    <img class="img-fluid post-img wow animated fadeIn" src="/storage/cover_images/{{$loops1->cover_image}}"
                        alt="">
                </a>
            </div>
            <div class="col-md-6 text-left">
                <br>
                <br>
                <br>
                <h3 class="loop-color post-title">
                    <i>"{{$loops1->title}}"</i>
                </h3><br>
                <h6>{!!$loops1->body!!}</h6><br><br>
                <p>POSTED ON:
                    <span class="loop-color">{{$loops1->created_at}}</span>
                </p>
                <p>BY:
                    <span class="loop-color">{{$loops1->user->name}}</span>
                </p>
                <p>ORGANIZATION:
                    <span class="loop-color">{{$loops1->role}}</span>
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
<div id="loopFooter">
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