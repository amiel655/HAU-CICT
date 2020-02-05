@extends('layouts.app') 
@section('title', '| CISCO') 
@section('orgs-stylesheets')
<link rel="stylesheet" href="css/orgs.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.navbar')
<div id="ciscoHeader">
    <span>
        <img src="assets/imgs/logo/cisco_logo.jpg" alt="Cisco's Logo" class="img-fluid rounded-circle">
    </span>
    <h1 class="txt">
        <br/>Cisco Student Organization</h1>
    <h2 class="ptxt">&bull; NETWORK ADMINISTRATION &bull;</h2>
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
                <img src="assets/imgs/orgs/cisco_cover.png" alt="Cisco Members" class="img-fluid">
            </div>
            <div class="col-md-7">

                <h1 class="txt cisco-color">
                    Cisco Student Organization
                </h1>

                <div>
                    <hr class="hrO">
                    <br>
                    <br>
                    <br>
                    <p class="ptxt">
                        The CISCO STUDENT ORGANIZATION (CSO) is a college-based organization consisting of students who are taking up Network Administration
                        in Holy Angel University. CSO aims to develop a strong and steady organization that represents not
                        only us, but the whole university.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="major container 75%">
         <h3 class="header-post cisco-color">CISCO MEMBERS</h3>
        <hr class="cisco-hr">
        <div class="row">
        @if(count($users)>0) 
        @foreach($users as $users1) 
        @if($users1->role == 'Cisco')
                <div class="col-md-3">

                     <img class="img-fluid" src="/storage/cover_images/{{$users1->cover_image}}" alt="" height="200px" width="200px">
                <br>
                <br>

                <h3>Name:
                    <span class="cisco-color">{{$users1->title}}</span>
                </h3>
                <h5>Position:
                    <span class="cisco-color">{{$users1->body}}</span>
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
        <h3 class="cisco-color header-post">CISCO POSTS</h3>
        <hr class="cisco-hr"> 
        @if(count($cisco)>0) 
        @foreach($cisco as $cisco1) 
        @if($cisco1->role == 'Cisco')
            <div class="row">

                 <div class="col-md-6 text-center">
                <br>
                <br>
                    <img class="img-fluid post-img wow animated fadeIn" src="/storage/cover_images/{{$cisco1->cover_image}}"
                        alt="">
            </div>
            <div class="col-md-6 text-left">
                <br>
                <br>
                <br>
                <h3 class="cisco-color post-title">
                    <i>"{{$cisco1->title}}"</i>
                </h3><br>
                <h6>{!!$cisco1->body!!}</h6><br><br>
                <p>POSTER ON:
                    <span class="cisco-color">{{$cisco1->created_at}}</span>
                </p>
                <p>BY:
                    <span class="cisco-color">{{$cisco1->user->name}}</span>
                </p>
                <p>ORGANIZATION:
                    <span class="cisco-color">{{$cisco1->role}}</span>
                </p>
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
<div id="ciscoFooter">
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