<?php if(Session::has('message')): ?>
    <?php echo Session::get('message'); ?>
<?php endif; ?>

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
    <body>
        <div class="container">
            <h1>Klikken maar!</h1>
            <p>
                <input id="search" type="text" placeholder="Search friends..." />
                <a href="{{action('ApplicationController@getMatch');}}">Matches</a>
            </p>
            
            <?php $friends = $friendsList['data']; ?>
    
            <?php for ($i = 0; $i < 100; $i++): ?>
                <?php
                    $id = $friends[$i]['id'];
                    $name = $friends[$i]['name'];
                ?>
                <a href="/app/click/<?php echo $id ?>">
                    <img    
                            class="img-rounded" 
                            src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=200&height=200" 
                            title="<?php echo $name ?>" 
                            alt="<?php echo $name ?>" 
                            width="200px" 
                    />
                </a>
            <?php endfor; ?>
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
