@php 
    $pageName = 'Login';
    $login = 'active';
@endphp
@include('includes.head')
	
    <body class="blue-skin">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="Loader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
         
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ============================ Dashboard Header Start================================== -->
			<div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="_agt_dash dark" style="background:#675bca url({{asset('front-end/assets/img/tag-light.png')}}) no-repeat;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="_capt9oi">
                                        <h1 class="text-light">Login Page</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<!-- ========================== Dashboard Header header ============================= -->
			
			<!-- ========================== SignUp Elements ============================= -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <section class="gray-light">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row no-gutters position-relative log_rads">                                        
                                        <div class="col-lg-12 col-md-12 position-static p-4 pl-md-0">
                                            <div class="log_wraps">
                                                <div class="log__heads">
                                                    <h4 class="mt-0 logs_title">Sign <span class="theme-cl">In</span></h4>
                                                </div>

                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="email">Email <small class="text-danger">*</small></label>
                                                        <input type="email" class="form-control" required id="email" name="email">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="password">Password <small class="text-danger">*</small></label>
                                                        <input type="password" class="form-control" required id="password" name="password">
                                                    </div>
                                                    
                                                    <div class="logs_foot mb-3">
                                                        <div class="logs_foot_first">
                                                            @if (Route::has('password.request'))
                                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot your password?') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn_apply w-100 btn-danger">Log In</button>
                                                    </div>
                                                </form>
                                                <div class="logs_foot mb-3">
                                                    <div class="logs_foot_first">
                                                        Don't have an Account? <a href="{{ route('register') }}" class="theme-cl">Create One</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
			<!-- ========================== Login Elements ============================= -->
			
			<!-- =========================== Footer Start ========================================= -->
            @include('includes.footer')
			<!-- =========================== Footer End ========================================= -->	

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
        @include('includes.e_script')
	</body>
</html>