<?php if(Session::has('message')): ?>
    <?php echo Session::get('message'); ?>
<?php endif; ?>
<br>
<?php if (!empty($data)): ?>
    Hello, <?php echo e($data['name']); ?>
    <img src="<?php echo $data['photo']; ?>">
    <br>
    Your email is <?php echo $data['email']; ?>
    <br>
    <a href="app">Naar de App</a>
    <a href="logout">Logout</a>
<?php else: ?>
    Hi! Would you like to <a href="login/fb">Login with Facebook</a>?
<?php endif; ?>