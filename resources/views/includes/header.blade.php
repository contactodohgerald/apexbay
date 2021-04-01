  <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="header header-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <nav id="navigation" class="navigation navigation-landscape">
                                        <div class="nav-header">
                                            <a class="nav-brand" href="#">
                                                <img src="{{asset('front-end/assets/img/logo.png')}}" class="logo" alt="{{env('APP_NAME')}}" />
                                            </a>
                                            <div class="nav-toggle"></div>
                                        </div>
                                        <div class="nav-menus-wrapper">
                                            <ul class="nav-menu">

                                                <li class="<?php print @$index ?>">
                                                    <a href="/">Home</a>
                                                </li>                                            
                                                <li class="<?php print @$ad ?>">
                                                    <a href="{{route('create-ad')}}">Post New Ad</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Pricing</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Podcast</a>
                                                </li>

                                                @auth
                                                <li>
                                                    <a href="contact.html">My Profile</a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}" style="margin: 18px;">
                                                        @csrf

                                                        <button type="submit" class="btn-danger" style="height:40px; ">
                                                        <i class="ti-user mr-1"></i>{{ __('Log out') }}
                                                        </button>
                                                    </form>
                                                </li>
                                                @else
                                                <li>
                                                <a href="{{ route('login') }}">Sign In</a>
                                                </li>
                                                <li>
                                                <a href="{{ route('register') }}">Sign Up</a>
                                                </li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </nav>

                                    <form class="mb-4">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 col-md-10 col-sm-12">
                                                <div class="banner-search style-1">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control lio-rad" placeholder="i am looking for .... search text here" style=" border-radius:5px">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn bt-round"><i class="ti-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="container">
                    <div class="row">			
                            <!-- Single Category -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 btn_a site_color_dark">
                                <a href="#"><i class="fa fa-comment"></i>BIZ TALK</a>
                            </div>	
                            <!-- Single Category -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 btn_a site_color_light">
                                <a href="{{route('create-ad')}}"><i class="fa fa-plus"></i>POST A NEW AD</a>
                            </div>	
                        </div>
                   </div>
                </div>
            </div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			