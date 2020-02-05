@extends('layouts.app') 
@section('title', '| ADD MEMBER') 
@section('main-stylesheets')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >    
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>     
@stop 
@section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">ARCHIVE</span>
                </h1>
            </div>
        </div><br>
        @if(count($posts)>0)
@foreach($posts as $post)
@if($post->trashed())
<table class="table table-hover">
    <tr class="orange text-center">
        <th class="text-center">
            ID
        </th>
        <th class="text-center">
            POST TITLE
        </th>
        <th class="text-center">
            DELETED AT
        </th>
        <th class="text-center">
            ACTION
        </th>
    </tr>
<tr class="white text-center">
    <td>{{$post->id}}</td> 
    <td>{{$post->title}}</td> 
    <td>{{$post->deleted_at}}</td> 
    <td>
        {!! Form::open(["url"=>"posts/restore/$post->id"])!!}
        {!! Form::submit("RESTORE",["class"=>"btn-action"])!!}
        {!! Form::close() !!}
    </td>
</tr>
@else
<tr style="background-color:#fff">{{$post->deleted_at}}</tr>
@endif
</table>
@if($post->trashed())

@endif

    @endforeach
@else
<p>No posts found</p>
@endif
</table>
    </div>
</div>
@endSection