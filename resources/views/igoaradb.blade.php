@extends('layouts.app') 
@section('title', '| IGOARA ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop @section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container igoara-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="white"><img src="assets/imgs/logo/igoara_logo.jpg" class="img-fluid rounded-circle" height="50px" width="50px"> IGOARA POSTS</span>
                </h1><br>
                <a href="/igoara/create"><button class="btn-igoara"><i class="fa fa-plus"></i> CREATE NEW POST</button></a><br><br>
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
     @if (count($igoara) > 0)
@foreach ($igoara as $igoara1)
<tr class="white text-center">
    <td>{{$igoara1->title}}</td> 
    <td><a href="/igoara/{{$igoara1->id}}/edit"><button class="btn-action-igoara">EDIT</button></a></td>
    <td>
        {!!Form::open(['action'=> ['IgoaraController@destroy', $igoara1->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('DELETE', ['class' => 'btn-action-igoara'])}}
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
