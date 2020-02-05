@extends('layouts.app') 
@section('title', '| HOME') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.navbar')
<div class="faculty"><br><br><br>
    <div class="container">
        <br/>
        <br/>
        <h1 class="text-center title">
            <span class="white">HAU-</span>CICT | FACULTY</h1>
        <br/>
        <br/>
        <div class="row dean">
            <div class="col-md-4 col-lg-4 col-sm-4">
                <img src="/assets/imgs/dean.png" alt="" class="img-fluid">
                <h1 class="text-center post">CICT DEAN</h1>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-8">
                <br/>
                <br/>
                <p class="exP">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                    it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                    PageMaker including versions of Lorem Ipsum.

                </p>
            </div>
        </div>
        <br><br><br><br>
        <div class="row text-center">

            @if(count($member)>0) 
            @foreach($member->chunk(1) as $member2)
                @foreach($member2 as $member1) 
                @if($member1->role == 'admin')
                <div class="col-md-3">
                    <img src="/storage/cover_images/{{$member1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                    <h3 class="text-center orange">{{$member1->title}}</h3>
                    <p class="prof white">{{$member1->body}}
                    </p>
                </div>
                @endif 
                @endforeach
                
            @endforeach 
            @else
            <p>No posts found</p>
            @endif

            <br/>
            <br/>
        </div>
        <br>
        <br>
        <br>
    </div>
    @include('inc._footer') @endsection