@extends('layouts.app') 
@section('title', '| IGOARA') 
@section('orgs-stylesheets')
<link rel="stylesheet" href="css/orgs.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.navbar')
<div id="igoaraHeader">
    <span>
        <img src="assets/imgs/logo/igoara_logo.jpg" alt="Igoara's Logo" class="img-fluid rounded-circle">
    </span>
    <h1 class="txt">
        <br/>INTEREST GROUP OF ALLIED RANDOM ARTISTS</h1>
    <h2 class="ptxt">&bull; ANIMATION &bull;</h2>
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
                <img src="assets/imgs/orgs/igoara.png" alt="Igoara Members" class="img-fluid">
            </div>
            <div class="col-md-7">

                <h1 class="txt igoara-color">
                    INTEREST GROUP OF ALLIED RANDOM ARTISTS
                </h1>

                <div>
                    <hr class="hrO">
                    <br>
                    <br>
                    <br>
                    <p class="ptxt">
                        "IGOARA is an organization that promotes the interest of the creatives and at the same time, a venue for our creative students
                        to share their skills or voice-out their concepts and concerns with regards to the best interest
                        of the animation students" - Mr. Sig Yu
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="major container 75%">
        <h3 class="header-post igoara-color">IGOARA MEMBERS</h3>
        <hr class="igoara-hr">
        <div class="row">

            @if(count($users)>0) 
            @foreach($users as $users1) 
            @if($users1->role == 'Igoara')
            <div class="col-md-3">
                <img class="img-fluid" src="/storage/cover_images/{{$users1->cover_image}}" alt="" height="200px" width="200px">
                <br>
                <br>

                <h3>Name:
                    <span class="igoara-color">{{$users1->title}}</span>
                </h3>
                <h5>Position:
                    <span class="igoara-color">{{$users1->body}}</span>
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
        <h3 class="igoara-color header-post">IGOARA POSTS</h3>
        <hr class="igoara-hr"> 
        @if(count($igoara)>0) 
        @foreach($igoara as $igoara1) 
        @if($igoara1->role == 'Igoara')
        <div class="row">
            <div class="col-md-6 text-center">
                <br>
                <br>
                <a href="/igoara/{{$igoara1->id}}">
                    <img class="img-fluid post-img wow animated fadeIn" src="/storage/cover_images/{{$igoara1->cover_image}}"
                        alt="">
                </a>
            </div>
            <div class="col-md-6 text-left">
                <br>
                <br>
                <br>
                <h3 class="igoara-color post-title">
                    <i>"{{$igoara1->title}}"</i>
                </h3><br>
                <h6>{!!$igoara1->body!!}</h6><br><br>
                <p>POSTED ON:
                    <span class="igoara-color">{{$igoara1->created_at}}</span>
                </p>
                <p>BY:
                    <span class="igoara-color">{{$igoara1->user->name}}</span>
                </p>
                <p>ORGANIZATION:
                    <span class="igoara-color">{{$igoara1->role}}</span>
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
<div id="igoaraFooter">
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
@yield('p') 
@stop