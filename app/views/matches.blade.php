@extends('layouts.base')

@section('navigation-main')
    <li><a href="/">Profile</a></li>
    <li><a href="/app">Click</a></li>
    <li class="active"><a href="match">Matches</a></li>
@stop

@section('main-body')
<?php if (!empty($clicks)): ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1>Woehoehoe</h1>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="progress progress-striped active">
          <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span class="sr-only">100% Complete</span>
          </div>
        </div>
    </div>   
</div>
<div class="row">    
  <?php foreach ($clicks as $click): ?>
    <div class="col-xs-6 col-sm-4 col-md-2 fb-friend">
        <a href="http://facebook.com/<?php echo $click["clicker"]; ?>">
            <img    class="img-circle img-responsive" 
                    src="https://graph.facebook.com/<?php echo $click["clicker"]; ?>/picture?width=200&height=200 "
                    title="name"  
                    alt="name"
                    width="200px" />
        </a> 
    </div>          
  <?php endforeach; ?>
</div>
<?php else: ?><!-- Geen matches -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1>Jammer joh!</h1>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <div class="progress progress-striped active">
              <div class="progress-bar"  role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                <span class="sr-only">66% Complete</span>
              </div>
            </div>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <p>je hebt nog geen matches</p>
        </div>
    </div>   
</div>
<?php endif; ?>
    <div>{{@Session::get("clicked")}}</div>
@stop
