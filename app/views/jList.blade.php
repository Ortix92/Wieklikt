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
        <div id="search-wrapper" class="form-inline">
            <div class="form-group">
                <input id="search" type="text" class="form-control input" placeholder="Search friends..." />
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Filter <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a id="gender-male">Male only</a></li>
                    <li><a id="gender-female">Female only</a></li>
                    <li><a id="gender-both">Both</a></li>
                </ul>
            </div>
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