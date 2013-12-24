<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Wieklikt</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"></script>
        <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="/assets/js/wieklikt.js"></script>
        <style>
            .profileImage img:hover {
                cursor: pointer;
            }
        </style>
    </head>
    <body style="margin-top: 50px;">
        <?php if(Session::has('message')): ?>
           <p class="text-danger"><?php echo Session::get('message'); ?></p>
        <?php endif; ?>
        
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
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="app">Naar de app</a></li>
                        <li><a href="{{action('ApplicationController@getMatch');}}">Matches</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->    
            </div>
        </nav>
        <!-- End navigation for logged-in user --> 
        
        <div class="container">
            <h1>Klikken maar!</h1>
            <p>
                <input id="search" type="text" class="form-control input-lg" placeholder="Search friends..." />  
            </p>
            <div class="row">
            <?php $friends = $friendsList['data']; ?>
    
            <?php for ($i = 0; $i < 100; $i++): ?>
                <?php
                    $id = $friends[$i]['id'];
                    $name = $friends[$i]['name'];
                ?>
                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a href="/app/click/<?php echo $id ?>">
                    <img    
                            class="img-rounded" 
                            src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=156&height=156" 
                            title="<?php echo $name ?>" 
                            alt="<?php echo $name ?>" 
                            width="200px" 
                    />
                </a>
                </div>
            <?php endfor; ?>
            </div>
        </div>

        <!-- Javascript -->
        <script type="text/javascript">
            //            $(".profileImage").click(function() {
            //                $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
            //            })
        </script>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
