@extends('layouts.app') @section('title', '| NEWS & ARTICLES') @section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> @stop @section('content') @include('inc.navbar')
<div class="half">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center" id="header1">
                <br>
                <div class="border-highlight wow animated fadeInLeft"></div>
                <h1 class="lastestPost">
                    <span class="white"> ARTICLES</span>
                </h1>
                <div class="border-highlight wow animated fadeInRight"></div>
                <br>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
        @if(count($article)>0) 
        @foreach($article as $article1) 
        @if($article1->role == 'Faculty')
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="/storage/cover_images/{{$article1->cover_image}}">
                    <div class="card-body container">
                        <br>
                        <h5 class="card-title orange text-center">"{{$article1->title}}"</h5>
                        <p class="card-text white">{!!$article1->body!!}</p>
                        <p>POSTED ON:
                            <span class="orange">{{$article1->created_at}}</span><br>
                        
                        BY:
                            <span class="orange">{{$article1->user->name}}</span><br>
                        
                        ORGANIZATION:
                            <span class="orange">{{$article1->role}}</span>
                        </p>
                    </div>
                </div><br><br>

            </div>
        
        <br> 
        @endif 
        @endforeach 
        </div>
        @else
        <p>No posts found</p>
        @endif
        <br>
        <br>
        <br>
    </div>
</div>
@include('inc._footer') @endsection