@extends('layouts.base')

@section('navigation-main')
    <li><a href="/">Home</a></li>
    <li><a href="/app">Terug naar de app</a></li>
    <li><a href="/match">Matches</a></li>
    <li class="active"><a href="match">clicks</a></li>
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
    <?php if (!empty($clicks)): ?><!-- wel clicks -->
    <?php foreach ($clicks as $click): ?>

    <div class="col-md-4">
            <div>
                <img class="img-circle img-thumbnail" id="<?php echo $click["clickee"]; ?>" src="https://graph.facebook.com/<?php echo $click["clickee"]; ?>/picture?width=200&height=200 " />
                <h2>Voornaam Achternaam</h2>
                <a href="#" class="btn btn-primary" title="Enlace">Edit</a>
            </div>
        </div>        
    <?php endforeach; ?>
    <?php else: ?><!-- Geen clicks -->
    <p>You haven't clicked anyone yet! This means you still have 3 clicks remaining!</p>
    <?php endif; ?>
    <div>{{@Session::get("clicked")}}</div>
    </div>
@stop
