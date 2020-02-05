@extends('layouts.app') @section('title', '| NEWS & ARTICLES') @section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> @stop @section('content')
<div class="half">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center" id="header1">
                <div class="border-highlight wow animated fadeInLeft"></div>
                <h1 class="lastestPost">
                    <span class="white">NEWS &amp; ARTICLES</span>
                </h1>
                <div class="border-highlight wow animated fadeInRight"></div>
                <br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="newsBox">
                <div class="text-center">
                    <h1 class="newtxt">Balita ng rapi</h1>
                    <hr>
                    <img src="img1.jpg" class="img-fluid" width="400">
                    <br>
                    <br>
                    <p>asdasdhnaskdhaskdasjkdhasd
                    </p>
                </div>
            </div>
            <!--br keni, eke balu lage, eya bisa    -->
            <div class="col-md-12" id="newsBox">
                <div class="text-center">
                    <h1 class="newtxt">Balita ng rapi</h1>
                    <hr>
                    <img src="img1.jpg" class="img-fluid" width="400">
                    <br>
                    <br>
                    <p>asdasdhnaskdhaskdasjkdhasd
                        
                    </p>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
        <!--end of half bg-->
    </div>
    <!--ind of row-->
</div>
<!--end of container-->
<div class="article">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center" id="header2">
                <div class="border-highlight wow animated fadeInLeft"></div><br>
                <h1 class="">
                    <span class="white">ANNOUNCEMENTS</span>
                </h1>
                <div class="border-highlight wow animated fadeInRight"></div>
                <br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class=" col-md-6" id="artBox">
                <div class="text-center">
                    <h1 id="arttxt">Patatas ng rapi</h1>
                    <hr>
                    <img src="img1.jpg" class="img-fluid" width="400">
                    <br>
                    <br>
                    <p>asdasdhnaskdhaskdasjkdhasd
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <!--end of article bg-->
    </div>
</div>
@include('inc._footer') @endsection