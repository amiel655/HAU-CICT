@extends('layouts.app')

@section('content')
<h1>{{$loop->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$loop->cover_image}}" alt="">
<a href="/loop" class="btn btn-default">Go back</a>
<div>
    {!!$loop->body!!}
</div>
<hr>
<small>Written on {{$loop->created_at}} by {{$loop->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $loop->role || Auth::user()->role == 'admin')
<a href="/loop/{{$loop->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['LoopController@destroy', $loop->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection