<?php if (Session::has('message')): ?>
    <?php echo Session::get('message'); ?>
<?php endif; ?>
<html>
    <head>
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
        <script>
            $(function() {
                function display(friends) {
                    $("#container").empty();
                    
                    $.each(friends,function(index,friend) {
                        var html = '<div class="profileImage" style="float:left;padding:20px; width:200px">'
                        html += '<a href="/app/click/'+friend.id+'">'
                        html += '<img  id="'+friend.id+' " src="https://graph.facebook.com/'+friend.id+'/picture?width=200&height=200 " />'
                        html += '</a>'
                        html += '</div>'
                        $("#container").append(html)
                    })
                }
                $( "#search" ).autocomplete({
                    source: "/app/friends",
                    minLength: 2,
                    response: function( event, ui ) {
                        display(ui.content);
                    }
                });
            });
        </script>
    </head>
<body>
    <input id="search" type="text" placeholder="Search friends..." />
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