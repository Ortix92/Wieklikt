@extends('layouts.base')

@section('navigation-right')
    <a href="login/fb" class="btn btn-primary navbar-btn" role="button">Login</a>
@stop

@section('main-body')
    <div id="carousel-main" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-main" data-slide-to="1"></li>
            <li data-target="#carousel-main" data-slide-to="2"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="http://lorempixel.com/1170/400/cats/1" alt="Image">
                <div class="carousel-caption">
                    slide 1
                </div>
            </div>
            <div class="item">
                <img src="http://lorempixel.com/1170/400/cats/2" alt="Image">
                <div class="carousel-caption">
                    slide 2
                </div>
            </div>
            <div class="item">
                <img src="http://lorempixel.com/1170/400/cats/3" alt="Image">
                <div class="carousel-caption">
                    slide 3
                </div>
            </div>
        </div>
    
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-main" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-main" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
    <p>
    <div class="progress progress-striped active">
      <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        <span class="sr-only">0% Complete</span>
      </div>
    </div>
    </p>
    <div class="page-header">
        <h1>Hello there,</h1>
    </div>
    <p>
        Would you like to <a href="login/fb">Login with Facebook</a>? 
    </p>
    <p>This is the alpha version of wieklikt, welcome!</p>
    <p>Although the core functionality works; you can log in with facebook and click on your friends you want to date with. Other features like a maximum number of clicks, advanced sorting and detailed instrunctions are still absent.</p>
    <p>Take a look around and if you have any remarks, like bugs or ideas, feel free to mail them to <a href="mailto:thomas@wieklikt.nl">us</a>!</p>
@stop

