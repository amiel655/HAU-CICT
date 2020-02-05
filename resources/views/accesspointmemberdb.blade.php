@extends('layouts.app') 
@section('title', '| ACCESS POINT ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container accesspoint-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span>
                    <span class="orange">CICT</span> |
                    <span class="white">
                        <img src="assets/imgs/logo/theaccesspoint_logo.png" class="img-fluid rounded-circle" height="50px" width="50px">ACCESS POINT MEMBERS</span>
                </h1>
                <a href="/accesspointmemberdb/create">
                    <button class="btn-accesspoint">
                        <i class="fa fa-plus"></i> ADD MEMBER</button>
                </a>
            </div>
            @if (count($accesspointmemberdb) > 0) 
            @foreach ($accesspointmemberdb as $accesspointmemberdb1) 
            @if($accesspointmemberdb1->role == 'AccessPoint')
            <div class="col-md-3 text-center">
                <br>
                <br>
                <img src="/storage/cover_images/{{$accesspointmemberdb1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                <h4 class="white">{{$accesspointmemberdb1->title}}</h4>
                <h6 class="white">{!!$accesspointmemberdb1->body!!}</h6>
                <a href="/accesspointmemberdb/{{$accesspointmemberdb1->id}}/edit">
                    <button class="btn-action-accesspoint"> EDIT</button>
                </a>
                {!!Form::open(['action'=> ['AccessPointMemberController@destroy', $accesspointmemberdb1->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}} {{Form::submit('REMOVE', ['class' => 'btn-action-accesspoint'])}}
                {!!Form::close()!!}
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
@endsection
