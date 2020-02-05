@extends('layouts.app') 
@section('title', '| MANAGE FACULTY') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">FACULTY MEMBERS</span>
                </h1>
                <a href="/member/create">
                    <button class="btn-login">
                        <i class="fa fa-plus"></i> ADD MEMBER</button>
                </a>
            </div>
            @if (count($member) > 0) 
            @foreach ($member as $member1) 
            @if($member1->role == 'admin')
            <div class="col-md-3 text-center">
                <br>
                <br>
                <img src="/storage/cover_images/{{$member1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                <h4 class="orange">{{$member1->title}}</h4>
                <a href="/member/{{$member1->id}}/edit">
                    <button class="btn-action"> EDIT</button>
                </a>
                {!!Form::open(['action'=> ['MemberController@destroy', $member1->id], 'method' => 'POST', 'class' => 'float-right'])!!} 
                {{Form::hidden('_method','DELETE')}} 
                {{Form::submit('REMOVE', ['class' => 'btn-action'])}} {!!Form::close()!!}
            </div>
            @endif 
            @endforeach
            </table>
            @else
            <h3 class="text-center white">NO MEMBER/S FOUND</h3><br>
            @endif
        </div>
    </div>
    <br>
</div>
@endSection