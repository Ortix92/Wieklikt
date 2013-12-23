<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Wieklikt</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
    </head>
    <body style="padding-top: 50px;">
        <?php if(Session::has('message')): ?>
            <p class="text-danger"><?php echo Session::get('message'); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($data)): ?>
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
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->    
            </div>
        </nav>
        <!-- End navigation for logged-in user --> 
        
              
        <div class="container">
            <header>
                <h1><small>Hello</small> <?php echo e($data['name']); ?></h1>
            </header>
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
        <!-- end of logged in -->
        
        <?php else: ?>
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
                        <li><a href="login/fb">Login</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->    
            </div>
        </nav>
        <!-- End navigation for not-logged-in user --> 

        <div class="container">
            <header>
                <h1>Hello there,</h1>
            </header>
            <p>
                Would you like to <a href="login/fb">Login with Facebook</a>? 
            </p>
        </div>
        <?php endif; ?>

    <!-- Javascript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
