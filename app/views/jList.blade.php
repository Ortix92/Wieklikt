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
        <script src="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"></script>

        <style>
            .profileImage img:hover {
                cursor: pointer;
            }
        </style>
    </head>
    <body style="margin-top: 50px;">
        <?php if (Session::has('message')): ?>
            <p class="text-danger"><?php echo Session::get('message'); ?></p>
        <?php endif; ?>

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
                            <li><a href="/">Home</a></li>
                            <li class="active"><a href="app">Naar de app</a></li>
                            <li><a href="{{action('ApplicationController@getMatch');}}">Matches</a></li>
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
                    <h1>Klikken maar!</h1>
                </div>
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
                        <div class="col-xs-6 col-sm-4 col-md-2 fb-friend">
                            <a href="/app/click/<?php echo $id ?>">
                                <img    class="img-rounded img-responsive" 
                                        src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=200&height=200" 
                                        title="<?php echo $name ?>" 
                                        alt="<?php echo $name ?>" 
                                        width="200px" />
                                <p class="text-center"><?php echo $name ?></p>
                            </a>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript">
            //            $(".profileImage").click(function() {
            //                $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
            //            })
        </script>
        <script src="assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="/assets/js/wieklikt.js"></script>
    </body>
</html>
