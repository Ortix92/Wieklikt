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
<div class="page-header">
    <h1>Hello there,</h1>
</div>
<p>
    Would you like to <a href="login/fb">Login with Facebook</a>? 
</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, omnis, officiis distinctio repellat id minus ab quod numquam aliquam explicabo facere quae maxime qui doloremque repellendus deserunt mollitia. Explicabo, hic tenetur culpa beatae esse ad illum deserunt voluptates necessitatibus excepturi. Dolorum, odio, nulla, iste necessitatibus reiciendis molestiae similique dolores sint facere fugiat impedit dicta! Corporis, eaque, reprehenderit, dolores unde et optio nam sapiente magni placeat non voluptatum nisi aliquid illum doloremque perspiciatis numquam temporibus consectetur illo reiciendis laborum? Maiores, mollitia, doloribus culpa officiis qui nam excepturi recusandae tempora commodi quasi quod quis repudiandae perspiciatis quisquam quo reprehenderit blanditiis consectetur autem?</p>
@stop

