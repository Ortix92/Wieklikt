<?php if(Session::has('message')): ?>
<?php echo Session::get('message'); ?>
<?php endif; ?>
<html>
    <body>
        <?php $friends = $friendsList['data']; ?>
        <div id="container" style="margin:0 auto">
            <div style="margin:0 auto">

                <?php for ($i = 0; $i < 30; $i++): ?>
                    <?php
                    $id = $friends[$i]['id'];
                    $name = $friends[$i]['name'];
                    ?>
                    <div style="float:left;padding:20px; width:200px">
                        <a href="click/<?php echo $id; ?>"><img src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=200&height=200 " /></a>
                    </div>
                <?php endfor; ?>
                <div style="clear:both"></div>
            </div>
        </div>
    </body>
</html>