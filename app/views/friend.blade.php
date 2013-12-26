<div class="col-xs-6 col-sm-4 col-md-2 fb-friend">
    <a href="/app/click/<?php echo $friend["id"] ?>">
        <img    class="img-rounded img-responsive" 
                src="https://graph.facebook.com/<?php echo $friend["id"]; ?>/picture?width=200&height=200" 
                title="<?php echo $friend["name"] ?>" 
                alt="<?php echo $friend["name"] ?>" 
                width="200px" />
        <p class="text-center"><?php echo $friend["name"] ?></p>
    </a>
</div>