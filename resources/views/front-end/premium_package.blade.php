@php 
    $pageName = 'Premium Subscription';
    $login = 'active';

@endphp
<!-- ============================ Head  Start ================================== -->
@include('includes.head')
<!-- ============================ Head End ================================== -->
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            @include('includes.header')
			<!-- ============================================================== -->
			
			<!-- ============================ Dashboard Header Start================================== -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="_agt_dash dark" style="background:#675bca url({{asset('front-end/assets/img/tag-light.png')}}) no-repeat;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="_capt9oi">
                                    <h1 class="text-light">About Us</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<!-- ========================== Dashboard Header header ============================= -->
		
			
			<!-- ========================== Team Elements ============================= -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <section class="min gray-light">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-9">
                                    <div class="sec-heading">
                                        <h3 class="text-danger">Activation ({{number_format($appSettings->activation_fee)}} NGN) required!</h3>
                                        <h2 class="text-center">Pay via</h2>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Single -->
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="nav flex nav-pills extra_jhysfr" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic" role="tab" aria-controls="v-pills-basic" aria-selected="true">Bank transfer / PoS / USSD </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">PayStack Gatway</a>
                                        </div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="container">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                                                <div class="team-grid">
                                                    <div class="container">
                                                        <div class="teamgrid-content">
                                                            <div class="money_style">
                                                                <h3>Account Name:    <b>{{$appSettings->account_name}}</b></h3>
                                                            </div>
                                                            <div class="money_style">
                                                                <h3>Account Number:    <b>{{$appSettings->account_number}}</b></h3>
                                                            </div>
                                                            <div class="money_style">
                                                                <h3>Bank Name:    <b>{{$appSettings->bank_name}}</b></h3>
                                                            </div>
                                                        </div>
                                                        <p><span class="text-danger">*</span> Notify us with your payment details via any of the contact links so we can trace and activate your payment.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <div class="team-grid">
                                                    <div class="container">
                                                        <div class="teamgrid-content">
                                                            <div class="container">
                                                                
                                                                <button class="btn btn-primary">Pay Now</button>
                                                                <p><span class="text-danger">*</span> Notify us with your payment details via any of the contact links so we can trace and activate your payment.</p>
                                                            </div>
                                                        </div>
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
			<!-- ========================== Team Elements ============================= -->
			
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