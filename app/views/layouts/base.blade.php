<!doctype html>
<html lang="en">
    <head>
        @section('head')
        <meta charset="utf-8" />
        <title>Wieklikt</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> Bootstrap theme CSS CDN -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/cyborg/bootstrap.min.css"> <!-- Bootstrap CSS CDN with Cyborgh theme -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- Font awesome icons CSS CDN -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/wieklikt.css')}}"> <!-- Our custom Wieklikt CSS -->
        <!--<script src="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"></script>-->

        {{-- End head --}}
        @show
    </head>
    <body>
        @section('body')
        <?php if (Session::has('message')): ?>
            <p class="text-danger"><?php echo Session::get('message'); ?></p>
        <?php endif; ?>

        <div id="wrap">      
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">WieKlikt</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            @yield('navigation-main')
                        </ul>
                        <div class="nav navbar-right">
                            @section('navigation-right')
                            <a href="{{URL::route('logout')}}" class="btn btn-default navbar-btn" role="button">Logout</a>
                            @show
                        </div>
                    </div><!-- /.navbar-collapse -->    
                </div>
            </nav>

            <div class="container">
                <div id="notification-wrapper">
                </div>
                @yield('main-body')
            </div>
        </div>

        @section('footer')
        <footer>
        </footer>
        {{-- End Footer--}}
        @show

        <!-- Javascript -->
        @section('scripts')
        <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script> <!-- JQuery javascript CDN -->
        <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script> <!-- JQuery UI CDN -->

        <script type="text/javascript">
            //            $(".profileImage").click(function() {
            //                $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
            //            })
        </script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> <!-- Bootstrap javascript CDN -->
        <script type="text/javascript" src="{{ URL::asset('assets/js/wieklikt.js')}}"></script> <!-- Our custom Wieklikt javascript -->
        {{-- End scripts--}}    
        @show
        {{-- End body --}}
        @show
    </body>
</html>
