@extends('layouts.app')

@section('content')
<h1>{{$loopmemberdb->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$loopmemberdb->cover_image}}" alt="">
<a href="/accesspointmemberdb" class="btn btn-default">Go back</a>
<div>
    {!!$loopmemberdb->body!!}
</div>
<hr>
<small>Written on {{$loopmemberdb->created_at}} by {{$loopmemberdb->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $loopmemberdb->role || Auth::user()->role == 'admin')
<a href="/loopmemberdb/{{$loopmemberdb->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['AccessPointMemberController@destroy', $loopmemberdb->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection