@extends('layouts.base')
@section('navigation-main')
<li><a href="/">Home</a></li>
<li class="active"><a href="/app">Naar de app</a></li>
<li><a href="{{action('ApplicationController@getMatch');}}">Matches</a></li>
@stop
@section('main-body')
<div id="wrap">      

    <div class="page-header">
        <h1>Klikken maar!</h1>
    </div>
    <p>
        <input id="search" type="text" class="form-control input-lg" placeholder="Search friends..." /> 
    </p>
    <div class="row">
        @each('friend',$friends,'friend')
    </div>

</div>
@stop