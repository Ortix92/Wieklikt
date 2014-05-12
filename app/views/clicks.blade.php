@extends('layouts.base')

@section('navigation-main')
<li><a href="/"><i class="fa fa-user fa-lg fa-fw"></i> Profile</a></li>
<li><a href="/app"><i class="fa fa-users fa-lg fa-fw"></i> Click</a></li>
<li class="active"><a href="{{action('ApplicationController@getClicks');}}"><i class="fa fa-thumb-tack fa-lg fa-fw"></i> Clicks</a></li>
<li><a href="{{action('ApplicationController@getMatch');}}"><i class="fa fa-link fa-lg fa-fw"></i> Matches</a></li>

@stop

@section('main-body')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1>Your clicks!</h1>
        </div>
    </div>   
</div>
<div class="row destacados">

    <?php foreach ((array) $clicks as $i => $click) { ?>
        <div class="col-md-4">
            <div>
                <img class="img-circle img-thumbnail" id="<?php echo $click["id"]; ?>" src="https://graph.facebook.com/<?php echo $click["id"]; ?>/picture?width=200&height=200 " />
                <h2>{{$click['name']}}</h2>
                <a href="#" class="btn btn-primary" title="Enlace">Edit</a>
            </div>
        </div>     
    <?php
    }
    $allowedClicks = 25;
    for ($i = count((array) $clicks); $i < $allowedClicks; $i++) {
        ?>

        <div class="col-md-4">
            <div>
                <img class="img-circle img-thumbnail" id="emptyclick" src="nogniks" />
                <h2>LEEG {{$i + 1}}</h2>
                <a href="#" class="btn btn-primary" title="Enlace">Edit</a>
            </div>
        </div> 
<?php } ?>

</div>
@stop
