@extends('layouts.app')

@section('content')
<h1>{{$codegeeks->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$codegeeks->cover_image}}" alt="">
<a href="/loop" class="btn btn-default">Go back</a>
<div>
    {!!$codegeeks->body!!}
</div>
<hr>
<small>Written on {{$codegeeks->created_at}} by {{$codegeeks->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $codegeeks->role || Auth::user()->role == 'admin')
<a href="/codegeeks/{{$codegeeks->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['CodeGeeksController@destroy', $codegeeks->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection