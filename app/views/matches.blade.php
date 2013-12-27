<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Wieklikt</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/bootstrap-theme.css">
        <link rel="stylesheet" href="/assets/css/wieklikt.css">
        
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
                        <li><a href="/app">Terug naar de app</a></li>
                        <li class="active"><a href="match">Matches</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->    
            </div>
        </nav>
        <!-- End navigation for logged-in user -->
        <div class="container">
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
        </div>
</div>
<footer>
    <div class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>
</footer>
</body>
</html>

