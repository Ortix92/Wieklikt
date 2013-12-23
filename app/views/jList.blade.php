<?php if (Session::has('message')): ?>
    <?php echo Session::get('message'); ?>
<?php endif; ?>
<html>
    <head>
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
        <input id="search" type="text" placeholder="Search friends..." />
        <a href="{{action('ApplicationController@getMatch');}}">Matches</a>
        <?php $friends = $friendsList['data']; ?>
        <div id="container" style="margin:0 auto">

            <?php for ($i = 0; $i < 100; $i++): ?>
                <?php
                $id = $friends[$i]['id'];
                $name = $friends[$i]['name'];
                ?>
                <div class="profileImage" style="float:left;padding:20px; width:200px">
                    <a href="/app/click/<?php echo $id ?>">
                        <img  id="<?php echo $id; ?>" src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=200&height=200 " />
                    </a>
                </div>
            <?php endfor; ?>
            <div style="clear:both"></div>
        </div>
        <script type="text/javascript">
            //            $(".profileImage").click(function() {
            //                $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
            //            })
        </script>
    </body>
</html>