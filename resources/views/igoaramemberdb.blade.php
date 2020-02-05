@extends('layouts.app') 
@section('title', '| IGOARA ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container igoara-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span>
                    <span class="orange">CICT</span> |
                    <span class="white">
                        <img src="assets/imgs/logo/igoara_logo.jpg" class="img-fluid rounded-circle" height="50px" width="50px">IGOARA MEMBERS</span>
                </h1>
                <a href="/igoaramemberdb/create">
                    <button class="btn-igoara">
                        <i class="fa fa-plus"></i> ADD MEMBER</button>
                </a>
            </div>
            @if (count($igoaramemberdb) > 0) 
            @foreach ($igoaramemberdb as $igoaramemberdb1) 
            @if($igoaramemberdb1->role == 'Igoara')
            <div class="col-md-3 text-center">
                <br>
                <br>
                <img src="/storage/cover_images/{{$igoaramemberdb1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                <h4 class="white">{{$igoaramemberdb1->title}}</h4>
                <h6 class="white">{!!$igoaramemberdb1->body!!}</h6>
                <a href="/igoaramemberdb/{{$igoaramemberdb1->id}}/edit">
                    <button class="btn-action-igoara"> EDIT</button>
                </a>
                {!!Form::open(['action'=> ['IgoaraMemberController@destroy', $igoaramemberdb1->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}} {{Form::submit('REMOVE', ['class' => 'btn-action-igoara'])}}
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