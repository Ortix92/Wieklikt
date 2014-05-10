@extends('layouts.base')

@section('navigation-main')
<li><a href="/">Profile</a></li>
<li><a href="/app">Click</a></li>
<li class="active"><a href="match">Matches</a></li>
@stop

@section('main-body')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="page-header">
                <h1>Matches</h1>
            </div>
        </div>   
    </div>
<?php if (!empty($profiles)): ?><!-- Matches -->
    <div class="row"> 
        <?php foreach ($profiles as $profile): ?>

            <div class="col-xs-6 col-sm-4 col-md-2 fb-friend">
                <a href="http://facebook.com/<?php echo $profile->uid; ?>">
                    <img    class="img-circle img-responsive" 
                            src="https://graph.facebook.com/<?php echo $profile->uid; ?>/picture?width=200&height=200 "
                            title="name"  
                            alt="name"
                            width="200px" />
                    <p class="text-center"><?php echo $profile->user->name; ?></p>
                </a> 
            </div>          
        <?php endforeach; ?>
    </div>
<?php else: ?><!-- No Matches -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="page-header">
                <p>Unfortunately you don't have any matches yet, keep clicking!</p>
            </div>
        </div>   
    </div>
<?php endif; ?>
<div>{{@Session::get("clicked")}}</div>
@stop
