@extends('layouts.app') 
@section('title', '| CSO ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container cisco-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span>
                    <span class="orange">CICT</span> |
                    <span class="white">
                        <img src="assets/imgs/logo/cisco_logo.jpg" class="img-fluid rounded-circle" height="50px" width="50px"> CSO MEMBERS</span>
                </h1>
                <a href="/ciscomemberdb/create">
                    <button class="btn-cisco">
                        <i class="fa fa-plus"></i> ADD MEMBER</button>
                </a>
            </div>
            @if (count($ciscomemberdb) > 0) 
            @foreach ($ciscomemberdb as $ciscomemberdb1) 
            @if($ciscomemberdb1->role == 'Cisco')
            <div class="col-md-3 text-center">
                <br>
                <br>
                <img src="/storage/cover_images/{{$ciscomemberdb1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                <h4 class="white">{{$ciscomemberdb1->title}}</h4>
                <h6 class="white">{!!$ciscomemberdb1->body!!}</h6>
                <a href="/ciscomemberdb/{{$ciscomemberdb1->id}}/edit">
                    <button class="btn-action-cisco"> EDIT</button>
                </a>
                {!!Form::open(['action'=> ['CiscoMemberController@destroy', $ciscomemberdb1->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}} {{Form::submit('REMOVE', ['class' => 'btn-action-cisco'])}}
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
