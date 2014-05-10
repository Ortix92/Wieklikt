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
    <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
         <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo e($data['name']); ?></h2>
                    <p><strong>Email:</strong> <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></p>
                    <p><strong>Facebook ID: </strong> {{$me->profile->uid}}</p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="<?php echo $data['photo']; ?>" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Handsome!</p>
                        </figcaption>
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> {{count($friends)}} </strong></h2>
                    <p><small>Friends</small></p>
                    <button href="app" class="btn btn-success btn-block"><span class="fa fa-users"></span> Get clicking! </button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> {{count($me->clickedFriends)}} of 3 </strong></h2>
                    <p><small>Clicked</small></p>
                    <button href="clicks" class="btn btn-info btn-block"><span class="fa fa-heart"></span> Clicks </button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> {{count($matches)}} </strong></h2>
                    <p><small>Matches</small></p>
                    <button href="matches" class="btn btn-primary btn-block"><span class="fa fa-link"></span> Matches </button>
                </div>
            </div>
         </div>                 
    </div>
</div>
@stop