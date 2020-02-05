@extends('layouts.app') 
@section('title', '| CODEGEEKS ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container codegeeks-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span>
                    <span class="orange">CICT</span> |
                    <span class="white">
                        <img src="assets/imgs/logo/codegeeks_logo.jpg" class="img-fluid rounded-circle" height="50px" width="50px">CODEGEEKS MEMBERS</span>
                </h1>
                <a href="/codegeeksmemberdb/create">
                    <button class="btn-codegeeks">
                        <i class="fa fa-plus"></i> ADD MEMBER</button>
                </a>
            </div>
            @if (count($codegeeksmemberdb) > 0) 
            @foreach ($codegeeksmemberdb as $codegeeksmemberdb1) 
            @if($codegeeksmemberdb1->role == 'CodeGeeks')
            <div class="col-md-3 text-center">
                <br>
                <br>
                <img src="/storage/cover_images/{{$codegeeksmemberdb1->cover_image}}" alt="" class="img-fluid" height="150px" width="150px">
                <h4 class="white">{{$codegeeksmemberdb1->title}}</h4>
                <h6 class="white">{!!$codegeeksmemberdb1->body!!}</h6>
                <a href="/codegeeksmemberdb/{{$codegeeksmemberdb1->id}}/edit">
                    <button class="btn-action-codegeeks"> EDIT</button>
                </a>
                {!!Form::open(['action'=> ['CodeGeeksMemberController@destroy', $codegeeksmemberdb1->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}} {{Form::submit('REMOVE', ['class' => 'btn-action-codegeeks'])}}
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
