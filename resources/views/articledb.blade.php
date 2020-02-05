@extends('layouts.app') 
@section('title', '| FACULTY ADMIN') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop @section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">FACULTY ARTICLES</span>
                </h1><br>
                <a href="/article/create"><button class="btn-login"><i class="fa fa-plus"></i> CREATE NEW ARTICLE</button></a><br><br>
            </div>
        </div><br>
      
<table class="table table-hover">
    <tr class="white text-center">
        <th class="text-center">
            ARTICLE TITLE
        </th>
        <th class="text-center">
            EDIT ARTICLE
        </th>
        <th class="text-center">
            DELETE ARTICLE
        </th>
    </tr>
     @if (count($articledb) > 0)
@foreach ($articledb as $articledb1)
<tr class="white text-center">
    <td>{{$articledb1->title}}</td> 
    <td><a href="/article/{{$articledb1->id}}/edit"><button class="btn-action ">EDIT</button></a></td>
    <td>
        {!!Form::open(['action'=> ['ArticleController@destroy', $articledb1->id], 'method' => 'POST', 'class' => 'float-center'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn-action'])}}
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
