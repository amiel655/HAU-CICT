@extends('layouts.app')

@section('content')
<h1>{{$member->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$member->cover_image}}" alt="">
<a href="/member" class="btn btn-default">Go back</a>
<div>
    {!!$member->body!!}
</div>
<hr>
<small>Written on {{$member->created_at}} by {{$member->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == 'Faculty' || Auth::user()->role == 'admin')
<a href="/member/{{$member->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['MemberController@destroy', $member->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection