@extends('layouts.base')

@section('navigation-right')
    <a href="login/fb" class="btn btn-primary navbar-btn" role="button"><i class="fa fa-facebook fa-lg fa-fw"></i> Login</a>
@stop

@section('main-body')      
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="page-header">
            <h1>Hello there,</h1>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p>Would you like to <a href="login/fb">Login with Facebook</a>? </p>
        <p>This is the alpha version of wieklikt, welcome!</p>
        <p>Although the core functionality works; you can log in with facebook and click on your friends you want to date with. Other features like a maximum number of clicks, advanced sorting and detailed instructions are still absent.</p>
        <p>Take a look around and if you have any remarks, like bugs or ideas, feel free to mail them to <a href="mailto:thomas@wieklikt.nl">us</a>!</p>
    </div>   
</div>    
@stop

