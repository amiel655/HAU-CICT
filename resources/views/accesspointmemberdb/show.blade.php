@extends('layouts.app')

@section('content')
<h1>{{$accesspointmemberdb->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$accesspointmemberdb->cover_image}}" alt="">
<a href="/accesspointmemberdb" class="btn btn-default">Go back</a>
<div>
    {!!$accesspointmemberdb->body!!}
</div>
<hr>
<small>Written on {{$accesspointmemberdb->created_at}} by {{$accesspointmemberdb->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $accesspointmemberdb->role || Auth::user()->role == 'admin')
<a href="/accesspointmemberdb/{{$accesspointmemberdb->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['AccessPointMemberController@destroy', $accesspointmemberdb->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection