<!doctype html>
<html lang="en">
    <head>
        @section('head')
        <meta charset="utf-8" />
        <title>Wieklikt</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/wieklikt.css')}}">
        <script src="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css')}}"></script>

        <style>
            .profileImage img:hover {
                cursor: pointer;
            }
        </style>
        {{-- End head --}}
        @show
    </head>
    <body style="margin-top: 50px;">
        @section('body')
        <?php if (Session::has('message')): ?>
            <p class="text-danger"><?php echo Session::get('message'); ?></p>
        <?php endif; ?>

        <div id="wrap">      
            <!-- Begin navigation for logged-in user -->
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
                            <a href="logout" class="btn btn-default navbar-btn" role="button">Logout</a>
                            @show
                        </div>
                    </div><!-- /.navbar-collapse -->    
                </div>
            </nav>
            <!-- End navigation for logged-in user --> 

            <div class="container">
                <div class="wrap">
                    @yield('main-body')
                </div>
            </div>
        </div>

        @section('footer')
        <footer>
            <div class="container">
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </div>
        </footer>
        {{-- End Footer--}}
        @show

        <!-- Javascript -->
        @section('scripts')
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript">
            //            $(".profileImage").click(function() {
            //                $(this).animate({opacity: "0.0"}).animate({width: 0}).hide(0);
            //            })
        </script>
        <script src="{{ URL::asset('assets/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/wieklikt.js')}}"></script>
        {{-- End scripts--}}    
        @show
        {{-- End body --}}
        @show
    </body>
</html>
