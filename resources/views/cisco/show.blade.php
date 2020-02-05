@extends('layouts.app')

@section('content')
<h1>{{$cisco->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$cisco->cover_image}}" alt="">
<a href="/loop" class="btn btn-default">Go back</a>
<div>
    {!!$cisco->body!!}
</div>
<hr>
<small>Written on {{$cisco->created_at}} by {{$cisco->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $cisco->role || Auth::user()->role == 'admin')
<a href="/cisco/{{$cisco->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['CiscoController@destroy', $cisco->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection