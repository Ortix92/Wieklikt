<?php if(Session::has('message')): ?>
    <?php echo Session::get('message'); ?>
<?php endif; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Wieklikt</title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
        <?php if (!empty($data)): ?>
            
            <p>
                Hello, <?php echo e($data['name']); ?>
                <img src="<?php echo $data['photo']; ?>">
            </p>
            <p>
                Your email is <?php echo $data['email']; ?>
            </p>
            <p>
                <a href="app">Naar de App</a>
                <a href="logout">Logout</a>
            </p>
            
        <!-- end of logged in -->
        <?php else: ?>
            
            <p>
                Hi! Would you like to <a href="login/fb">Login with Facebook</a>? 
            </p>
            
        <?php endif; ?>
        </div>
    <!-- Javascript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    </body>
</html>