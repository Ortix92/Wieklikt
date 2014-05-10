@extends('layouts.base')
@section('main-body')
<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <h1>Page not found <small>error 404</small></h1>
            <div class="error-details">
                This is not the page you are looking for.
            </div>
            <div class="error-actions">
                <a href="/" class="btn btn-primary btn-lg">
                	<i class="fa fa-home"></i> Take Me Home </a>
                <a href="mailto:thomas@wieklikt.nl" class="btn btn-default btn-lg">
                	<i class="fa fa-envelope"></i> Contact Support </a>
            </div>
        </div>
    </div>
</div>
@stop