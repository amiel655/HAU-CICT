@extends('layouts.app')

@section('content')
<h1>{{$ciscomemberdb->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$ciscomemberdb->cover_image}}" alt="">
<a href="/ciscomemberdb" class="btn btn-default">Go back</a>
<div>
    {!!$ciscomemberdb->body!!}
</div>
<hr>
<small>Written on {{$ciscomemberdb->created_at}} by {{$ciscomemberdb->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $ciscomemberdb->role || Auth::user()->role == 'admin')
<a href="/ciscomemberdb/{{$ciscomemberdb->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['CiscoMemberController@destroy', $ciscomemberdb->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection