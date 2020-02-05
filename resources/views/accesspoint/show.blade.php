@extends('layouts.app')

@section('content')
<h1>{{$accesspoint->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$accesspoint->cover_image}}" alt="">
<a href="/accesspoint" class="btn btn-default">Go back</a>
<div>
    {!!$accesspoint->body!!}
</div>
<hr>
<small>Written on {{$accesspoint->created_at}} by {{$accesspoint->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $accesspoint->role || Auth::user()->role == 'admin')
<a href="/accesspoint/{{$accesspoint->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['AccessPointController@destroy', $accesspoint->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection