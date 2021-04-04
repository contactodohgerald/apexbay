<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('front_end/images/logo_1x.png') }}" alt="{{ env('APP_NAME') }}" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('front_end/images/logo_1x.png') }}" alt="{{ env('APP_NAME') }}" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <!--
                    <span>
                <img src="images/logo_1x.png" alt="apexbay" class="dark-logo" />
                <img src="images/logo_1x.png" class="light-logo" alt="apexbay" />
                </span>
                -->
                
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- mega menu -->
                <!-- ============================================================== -->

                                    
                    <li class="nav-item dropdown mega-dropdown"> 

                        @auth
                            <a class="nav-link  waves-effect waves-light" href="{{ route('profile') }}">{{ ucfirst(auth()->user()->name) }}</a>
                        @else
                            <a class="nav-link  waves-effect waves-light" href="{{ route('login') }}">Login</a>
                        @endauth
                        
                    </li>
                
                <!-- ============================================================== -->
                <!-- End mega menu -->
                <!-- ============================================================== -->
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
            </ul>
        </div>
    </nav>
</header>  