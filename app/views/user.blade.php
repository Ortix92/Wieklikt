@extends('layouts.base')

@section('navigation-main')
    <li class="active"><a href="/"><i class="fa fa-user fa-lg fa-fw"></i> Profile</a></li>
    <li><a href="/app"><i class="fa fa-users fa-lg fa-fw"></i> Click</a></li>
    <li><a href="{{action('ApplicationController@getClicks');}}"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Clicks</a></li>
    <li><a href="{{action('ApplicationController@getMatch');}}"><i class="fa fa-link fa-lg fa-fw"></i> Matches</a></li>
@stop

@section('main-body')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1>Your profile</h1>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
         <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>{{$data->name}}</h2>
                    <p><strong>Email:</strong> <a href="mailto:{{$data->email}}">{{$data->email}}</a></p>
                    <p><strong>Facebook ID: </strong> <a href="http://facebook.com/{{$user->profile->uid}}">{{$user->profile->uid}}</a></p>
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
                    <a href="app" class="btn btn-success btn-block"><i class="fa fa-users fa-lg fa-fw"></i> Start clicking! </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> {{count($clicks)}} of 3 </strong></h2>
                    <p><small>Clicks used</small></p>
                    <a href="{{action('ApplicationController@getClicks');}}" class="btn btn-info btn-block"><i class="fa fa-heart fa-lg fa-fw"></i> Clicks </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> {{count($matches)}} </strong></h2>
                    <p><small><?php 
                        if (count($matches) == 0) {
                            echo 'Matches';
                        }
                        elseif (count($matches) == '1') {
                            echo 'Match!';
                        } 
                        else {
                            echo 'Matches!';
                        }?>
                        </small></p>
                    <a href="{{action('ApplicationController@getMatch');}}" class="btn btn-primary btn-block"><i class="fa fa-link fa-lg fa-fw"></i> Matches </a>
                </div>
            </div>
         </div>                 
    </div>
</div>
@stop