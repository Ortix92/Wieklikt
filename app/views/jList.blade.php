@extends('layouts.base')
@section('navigation-main')
<li><a href="/">Home</a></li>
<li class="active"><a href="/app">Naar de app</a></li>
<li><a href="{{action('ApplicationController@getMatch');}}">Matches</a></li>
@stop
@section('main-body')
    

    <div class="page-header">
        <h1>Klikken maar!</h1>
    </div>
    <p>
        <div class="progress progress-striped active">
          <div class="progress-bar"  role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
            <span class="sr-only">33% Complete</span>
          </div>
        </div>
    </p>
    <p>
        <input id="search" type="text" class="form-control input-lg" placeholder="Search friends..." /> 
    </p>
    <div class="row">
        @each('friend',$friends,'friend')
    </div>

@stop