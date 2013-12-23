<?php if (Session::has('message')): ?>
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
        <style>
            .profileImage img:hover {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <?php $friends = $friendsList['data']; ?>
        <div id="container" style="margin:0 auto">
            <div style="margin:0 auto"> <!-- nick, moet dat id="facebookid" in 't plaatje? Want dat heb je helemaal niet nodig toch? of gebruik je dat in de backend? -->

                <?php for ($i = 0; $i < 100; $i++): ?>
                    <?php
                    $id = $friends[$i]['id'];
                    $name = $friends[$i]['name'];
                    ?>
                        <a href="/app/click/<?php echo $id ?>"><img  class="img-rounded" src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=200&height=200" /></a>
                <?php endfor; ?>
                <div style="clear:both"></div>
            </div>
        </div>
        </div>
        <script type="text/javascript">
            //            $(".profileImage").click(function() {
            //                $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
            //            })
        </script>
    </body>
</html>