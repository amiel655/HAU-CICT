@extends('layouts.app') 
@section('title', '| LOOP ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container loop-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span>
                    <span class="orange">CICT</span> |
                    <span class="white">
                        <img src="assets/imgs/logo/loop_logo.png" class="img-fluid rounded-circle" height="50px" width="50px">ACCESS POINT MEMBERS</span>
                </h1>
                <a href="/loopmemberdb/create">
                    <button class="btn-loop">
                        <i class="fa fa-plus"></i> ADD MEMBER</button>
                </a>
            </div>
            @if (count($loopmemberdb) > 0) 
            @foreach ($loopmemberdb as $loopmemberdb1) 
            @if($loopmemberdb1->role == 'Loop')
            <div class="col-md-3 text-center">
                <br>
                <br>
                <img src="/storage/cover_images/{{$loopmemberdb1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                <h4 class="white">{{$loopmemberdb1->title}}</h4>
                <h6 class="white">{!!$loopmemberdb1->body!!}</h6>
                <a href="/loopmemberdb/{{$loopmemberdb1->id}}/edit">
                    <button class="btn-action-loop"> EDIT</button>
                </a>
                {!!Form::open(['action'=> ['LoopMemberController@destroy', $loopmemberdb1->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}} {{Form::submit('REMOVE', ['class' => 'btn-action-loop'])}}
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
