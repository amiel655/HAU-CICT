@extends('layouts.app')

@section('content')
<h1>POSTS</h1>
@foreach($trash as $post)
    <ul>
    <li>{{$post->title}}</li>
    <li>{!!Form::open(['action'=> ['Restore@index', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::submit('restore', ['class' => 'btn btn-success'])}}
    {!!Form::close()!!}</li>
    </ul>
@endforeach
@endsection