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
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
    </head>
    <body>
        <div class="container">
        <?php if (!empty($data)): ?>
            <header>
                <h1>Hello, <?php echo e($data['name']); ?></h1>
            </header>
            <div class="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">Home</li>
                    <li><a href="app">Naar de App</a></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </div>
            <p>
                
                <img src="<?php echo $data['photo']; ?>">
            </p>
            <p>
                Your email is <?php echo $data['email']; ?>
            </p>
            
        <!-- end of logged in -->
        <?php else: ?>
            <header>
                <h1>Hello there,</h1>
            </header>
            <div class="navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li> <a href="login/fb">Login</a></li>
                </ul>
            </div>
            <p>
                Would you like to <a href="login/fb">Login with Facebook</a>? 
            </p>
            
        <?php endif; ?>
        </div>
    <!-- Javascript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    </body>
</html>