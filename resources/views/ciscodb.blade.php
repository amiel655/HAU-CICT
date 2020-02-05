@extends('layouts.app') 
@section('title', '| CSO ADMIN') 
@section('main-stylesheets')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >    
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>     
@stop @section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container cisco-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="white"><img src="/assets/imgs/logo/cisco_logo.jpg" class="img-fluid rounded-circle" height="50px" width="50px"> CSO POSTS</span>
                </h1><br>
                <a href="/cisco/create"><button class="btn-cisco"><i class="fa fa-plus"></i> CREATE NEW POST</button></a><br><br>
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
    @if (count($cisco) > 0)
@foreach ($cisco as $cisco1)
<tr class="white text-center">
    <td>{{$cisco1->title}}</td> 
    <td><a href="/cisco/{{$cisco1->id}}/edit"><button class="btn-action-cisco">EDIT</button></a></td>
    <td>
        {!!Form::open(['action'=> ['CiscoController@destroy', $cisco1->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('DELETE', ['class' => 'btn-action-cisco'])}}
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
