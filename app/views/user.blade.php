<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Wieklikt</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/css/wieklikt.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="padding-top: 50px;">
        <?php if(Session::has('message')): ?>
            <p class="text-danger"><?php echo Session::get('message'); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($data)): ?>
<div id="wrap">       
        
          <!-- Begin navigation for logged-in user -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">WieKlikt</a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="app">Naar de app</a></li>
                    </ul>
                    <div class="nav navbar-right">
                        <a href="logout" class="btn btn-default navbar-btn" role="button">Logout</a>
                    </div>
                </div><!-- /.navbar-collapse -->    
            </div>
        </nav>
        <!-- End navigation for logged-in user --> 
        
              
        <div class="container">
            <div class="page-header">
                <h1><small>Hello</small> <?php echo e($data['name']); ?></h1>
            </div>
            <p>
                <img 
                    src="<?php echo $data['photo']; ?>" 
                    class="img-responsive img-rounded" 
                    alt="userphoto" 
                />
            </p>
            <p>
                Your email is <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a>.
            </p>
        </div>
        
</div>        
<footer>
    <div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>
</footer>
<!-- end of logged in -->                

                
<?php else: ?>
                
<div id="wrap">
    <!-- Begin navigation for not-logged-in user -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">WieKlikt</a>
            </div>
                
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                </ul>
                <div class="nav navbar-right">
                        <a href="login/fb" class="btn btn-primary navbar-btn" role="button">Login</a>
                    </div>
            </div><!-- /.navbar-collapse -->    
        </div>
    </nav>
    <!-- End navigation for not-logged-in user --> 

    <div class="container">
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
    </div>
</div>
<footer>
        <div class="container">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </div>
</footer>
        <?php endif; ?>

    <!-- Javascript --> 
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
