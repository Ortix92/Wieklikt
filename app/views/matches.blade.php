<div>{{@Session::get("clicked")}}</div>
<a href="{{action('ApplicationController@getIndex');}}">Terug naar de App</a><br />

<?php if (!empty($clicks)): ?>
    <?php foreach ($clicks as $click): ?>
        <div class="profileImage" style="float:left;padding:20px; width:200px">
            <a href="http://facebook.com/<?php echo $click["clicker"]; ?>">
                <img id="<?php echo $click["clicker"]; ?>" src="https://graph.facebook.com/<?php echo $click["clicker"]; ?>/picture?width=200&height=200 " />
            </a>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    je hebt nog geen matches
<?php endif; ?>

