@extends('layouts.app')

@section('content')
<h1>{{$article->title}}</h1>
<img class="img-responsive" style="width:100%" src="/storage/cover_images/{{$article->cover_image}}" alt="">
<a href="/article" class="btn btn-default">Go back</a>
<div>
    {!!$article->body!!}
</div>
<hr>
<small>Written on {{$article->created_at}} by {{$article->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->role == 'Faculty' || Auth::user()->role == 'admin')
<a href="/article/{{$article->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=> ['ArticleController@destroy', $article->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
    @endif
@endif
@endsection