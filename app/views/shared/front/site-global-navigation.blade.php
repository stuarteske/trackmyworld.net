<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">
                <i class="fa fa-play-circle"></i> Prayer Planner
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            @if (isset($noNavigation) == false)
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>

                @if (!Auth::check())
                <li class="page-scroll">
                    <a href="#signup">Sign Up</a>
                </li>
                @endif

                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>

                @if (!Auth::check())
                <li class="page-scroll">
                    <a href="{{ URL::to('login') }}">Login</a>
                </li>
                @else
                <li class="page-scroll">
                    <a href="{{ URL::action('DashboardController@dashboard') }}">Dashboard</a>
                </li>
                <li class="page-scroll">
                    <a href="{{ URL::to('logout') }}">Logout</a>
                </li>
                @endif
            </ul>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>