@extends('layouts.app')

@section('content')
<h1>{{$igoara->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$igoara->cover_image}}" alt="">
<a href="/igoara" class="btn btn-default">Go back</a>
<div>
    {!!$igoara->body!!}
</div>
<hr>
<small>Written on {{$igoara->created_at}} by {{$igoara->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $igoara->role || Auth::user()->role == 'admin')
<a href="/igoara/{{$igoara->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['IgoaraController@destroy', $igoara->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection