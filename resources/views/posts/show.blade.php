@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
<a href="/posts" class="btn btn-default">Go back</a>
<div>
    {!!$post->body!!}
</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == $post->role || Auth::user()->role == 'admin')
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection