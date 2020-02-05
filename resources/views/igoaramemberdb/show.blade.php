@extends('layouts.app')

@section('content')
<h1>{{$igoaramemberdb->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$igoaramemberdb->cover_image}}" alt="">
<a href="/igoaramemberdb" class="btn btn-default">Go back</a>
<div>
    {!!$igoaramemberdb->body!!}
</div>
<hr>
<small>Written on {{$igoaramemberdb->created_at}} by {{$igoaramemberdb->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $igoaramemberdb->role || Auth::user()->role == 'admin')
<a href="/igoaramemberdb/{{$igoaramemberdb->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['IgoaraMemberController@destroy', $igoaramemberdb->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection