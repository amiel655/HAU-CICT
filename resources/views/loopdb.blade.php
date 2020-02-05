@extends('layouts.app') 
@section('title', '| LOOP ADMIN') 
@section('main-stylesheets')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >    
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>     
@stop @section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container loop-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="white"><img src="/assets/imgs/logo/loop_logo.png" class="img-fluid rounded-circle" height="50px" width="50px"> LOOP POSTS</span>
                </h1><br>
                <a href="/loops/create"><button class="btn-loop"><i class="fa fa-plus"></i> CREATE NEW POST</button></a><br><br>
            </div>
        </div><br>
       
<table class="table table-hover">
    <tr class="white text-center">
        <th class="text-center">
            POST TITLE
        </th>
        <th class="text-center">
            EDIT POST
        </th>
        <th class="text-center">
            DELETE POST
        </th>
    </tr>
    @if (count($loop) > 0)
@foreach ($loop as $loop1)
<tr class="white text-center">
    <td>{{$loop1->title}}</td> 
    <td><a href="/loops/{{$loop1->id}}/edit"><button class="btn-action-loop">EDIT</button></a></td>
    <td>
        {!!Form::open(['action'=> ['LoopController@destroy', $loop1->id], 'method' => 'POST', 'class' => 'float-center'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('DELETE', ['class' => 'btn-action-loop'])}}
        {!!Form::close()!!}
    </td>
</tr>
@endforeach
</table>
    
@else
<h3 class="text-center white">NO POST/S FOUND</h3><br>
@endif
    </div>
</div>
@endsection
