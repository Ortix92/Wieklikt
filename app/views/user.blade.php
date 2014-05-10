@extends('layouts.base')

@section('navigation-main')
<li class="active"><a href="/">Profile</a></li>
<li><a href="app">Click</a></li>
<li><a href="{{action('ApplicationController@getMatch');}}">Matches</a></li>
@stop

@section('main-body')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1><small>Hello</small> <?php echo e($data['name']); ?></h1>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-md-8">
        <ul>
            <li>Your email is <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a>.</li>
            <li>Your facebook-id is: .</li>
            <li>You have # matches.</li>
            <li>You have used # of your 3 clicks this week.</li>
        </ul>
        <a href="app"><button type="button" class="btn btn-primary btn-lg">Start Clicking!</button></a>
    </div>
    <div class="col-md-4">
        <img src="<?php echo $data['photo']; ?>" class="img-responsive img-rounded" alt="userphoto" />
    </div>
</div>
@stop