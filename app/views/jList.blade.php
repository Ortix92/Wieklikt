@extends('layouts.base')
@section('navigation-main')
<li><a href="/">Profile</a></li>
<li class="active"><a href="/app">Click</a></li>
<li><a href="{{action('ApplicationController@getMatch');}}">Matches</a></li>
@stop
@section('main-body')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1>Lets click!</h1>
        </div>
    </div>   
</div>    
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="progress progress-striped active">
            <div class="progress-bar"  role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            </div>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="search-wrapper" class="form-inline">
            <div class="form-group">
                <input id="search" type="text" class="form-control input-lg" placeholder="Search friends..." />
            </div>
            <button id="gender-male" type="button" class="btn btn-lg btn-primary">Male</button>
            <button id="gender-female"type="button" class="btn btn-lg btn-primary">Female</button>
        </div>

    </div>   
</div>    
<div class="row">
    <div id="friendList" style="display:none">
        @each('friend',$friends,'friend')
    </div>
</div>

@stop

@section('scripts')
@parent
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.waitforimages.js')}}"></script>
@stop