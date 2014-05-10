@extends('layouts.base')

@section('navigation-main')
    <li><a href="/">Home</a></li>
    <li><a href="/app">Terug naar de app</a></li>
    <li><a href="/match">Matches</a></li>
    <li class="active"><a href="match">clicks</a></li>
@stop

@section('main-body')
    <h1>Clicks</h1>
    <?php if (!empty($clicks)): ?>
    <p>Your clicks:</p>
    <?php foreach ($clicks as $click): ?>
    <a href="http://facebook.com/<?php echo $click["clicker"]; ?>"><img class="img-circle" id="<?php echo $click["clicker"]; ?>" src="https://graph.facebook.com/<?php echo $click["clicker"]; ?>/picture?width=200&height=200 " /></a>           
    <?php endforeach; ?>
    <?php else: ?><!-- Geen clicks -->
    <p>You haven't clicked anyone yet! This means you still have 3 clicks remaining!</p>
    <?php endif; ?>
    <div>{{@Session::get("clicked")}}</div>
@stop
