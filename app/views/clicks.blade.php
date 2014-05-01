@extends('layouts.base')

@section('navigation-main')
    <li><a href="/">Home</a></li>
    <li><a href="/app">Terug naar de app</a></li>
    <li><a href="/match">Matches</a></li>
    <li class="active"><a href="match">clicks</a></li>
@stop

@section('main-body')
    <?php if (!empty($clicks)): ?>
    <p>
        <div class="progress progress-striped active">
          <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span class="sr-only">100% Complete</span>
          </div>
        </div>
    </p>
    <h1>Woehoehoe</h1>
    <?php foreach ($clicks as $click): ?>
    <a href="http://facebook.com/<?php echo $click["clicker"]; ?>"><img class="img-circle" id="<?php echo $click["clicker"]; ?>" src="https://graph.facebook.com/<?php echo $click["clicker"]; ?>/picture?width=200&height=200 " /></a>           
    <?php endforeach; ?>
    <?php else: ?><!-- Geen matches -->
    <p>
        <div class="progress progress-striped active">
          <div class="progress-bar"  role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
            <span class="sr-only">66% Complete</span>
          </div>
        </div>
    </p>
    <h1>Jammer joh!</h1>
    <p>
        je hebt nog geen matches
    </p>
    <?php endif; ?>
    <div>{{@Session::get("clicked")}}</div>
@stop
