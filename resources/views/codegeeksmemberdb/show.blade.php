@extends('layouts.app')

@section('content')
<h1>{{$codegeeksmemberdb->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$codegeeksmemberdb->cover_image}}" alt="">
<a href="/igoaramemberdb" class="btn btn-default">Go back</a>
<div>
    {!!$codegeeksmemberdb->body!!}
</div>
<hr>
<small>Written on {{$codegeeksmemberdb->created_at}} by {{$codegeeksmemberdb->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $codegeeksmemberdb->role || Auth::user()->role == 'admin')
<a href="/codegeeksmemberdb/{{$codegeeksmemberdb->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['CodeGeeksMemberController@destroy', $codegeeksmemberdb->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection