@extends('layouts.base')
@section('navigation-main')
    <li><a href="/"><i class="fa fa-user fa-lg fa-fw"></i> Profile</a></li>
    <li class="active"><a href="/app"><i class="fa fa-users fa-lg fa-fw"></i> Click</a></li>
    <li><a href="{{action('ApplicationController@getClicks');}}"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Clicks</a></li>
    <li><a href="{{action('ApplicationController@getMatch');}}"><i class="fa fa-link fa-lg fa-fw"></i> Matches</a></li>
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
    <div class="col-xs-10 col-sm-10 col-md-6 col-lg-4">
        <div id="search-wrapper" class="form-inline">
            
                <input id="search" type="text" class="form-control input" placeholder="Search friends..." />
            
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
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