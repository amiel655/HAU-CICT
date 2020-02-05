@extends('layouts.app') 
@section('title', '| MANAGE FACULTY') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop @section('content') 
@include('inc.admin-navbar')
<div id="loginForm">
    <div class="container login-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <span class="white">HAU-</span><span class="orange">CICT</span> | <span class="orange">USER LOGS</span>
                </h1>
            </div>
        </div><br>
<table class="table table-hover">
    <tr class="orange text-center">
        <th class="text-center">
            ID
        </th>
        <th class="text-center">
            NAME
        </th>
        <th class="text-center">
            LAST LOGIN AT
        </th>
        <th class="text-center">
            LAST LOGIN IP
        </th>
        <th class="text-center">
            REGISTERED DATE &amp; TIME
        </th>
    </tr>

@foreach($users as $user)
<tr class="white text-center">
    <td>
        {{$user->id}}
    </td>
    <td>
        {{$user->name}}
    </td>
    <td>
        {{$user->last_login_at}}
    </td>
    <td>
        {{$user->last_login_ip}}
    </td>
    <td>
        {{$user->created_at}}
    </td>
</tr>

@endforeach
</table>
    </div>
</div>
@endsection