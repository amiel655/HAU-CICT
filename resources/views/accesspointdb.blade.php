@extends('layouts.app') 
@section('title', '| ACCESS POINT ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop @section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container accesspoint-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="white"><img src="/assets/imgs/logo/theaccesspoint_logo.png" class="img-fluid rounded-circle" height="50px" width="50px"> ACCESS POINT POSTS</span>
                </h1><br>
                <a href="/accesspoint/create"><button class="btn-accesspoint"><i class="fa fa-plus"></i> CREATE NEW POST</button></a><br><br>
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
    @if (count($accesspoint) > 0)
@foreach ($accesspoint as $accesspoint1)
<tr class="white text-center">
    <td>{{$accesspoint1->title}}</td> 
    <td><a href="/accesspoint/{{$accesspoint1->id}}/edit"><button class="btn-action-accesspoint">EDIT</button></a></td>
    <td>
        {!!Form::open(['action'=> ['AccessPointController@destroy', $accesspoint1->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('DELETE', ['class' => 'btn-action-accesspoint'])}}
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
