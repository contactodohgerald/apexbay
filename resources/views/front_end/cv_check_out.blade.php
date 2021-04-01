@php 
    $pageName = 'Cv Checkout';
    $index = 'active';
@endphp

@include('include.head')

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div id="main-wrapper">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                @include('include.header')          
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper">
                    <!-- ============================================================== -->
                    <!-- Container fluid  -->
                    <!-- ============================================================== -->
                    <div class="container-fluid bg-white">
                        <!-- ============================================================== -->
                        <!-- Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->
                        <div class="row page-titles">
                            <div class="form-group center-search">
                                <div class="input-group mb-3 custom-search-height">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control custom-search-height" placeholder="I am looking for... search text here" aria-label="Username" aria-describedby="basic-addon1">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-list"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>                
                        <!-- ============================================================== -->
                        <!-- End Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <!-- Row -->
                        <div class="row">
                            
                            <!-- Column -->
                            <div class="col-12">
                                <div class="card">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Bank transfer / USSD</a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#paystack" role="tab">PayStack Gatway</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!--second tab-->
                                        <div class="tab-pane active" id="profile" role="tabpanel">
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
                                        <div class="tab-pane" id="paystack" role="tabpanel">
                                            <div class="team-grid">
                                                <div class="container">
                                                    <div class="teamgrid-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-6  offset-lg-3 col-12">
                                                                    <form method="POST" action="{{ route('pay') }}" >
                                                                        <p>Pay ₦ 1000 for Product / Services activation</p>

                                                                        <input type="hidden" name="email" value="{{ auth()->user()->email }}"> {{-- required --}}
                                                                        <input type="hidden" name="orderID" value="{{ Paystack::genTranxRef() }}">
                                                                        <input type="hidden" name="amount" value="{{ 1000 * 100 }}"> {{-- required in kobo --}}
                                                                        <input type="hidden" name="quantity" value="1">
                                                                        <input type="hidden" name="currency" value="NGN">
                                                                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['payment_type' => 'Cv Activation',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                                                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
                                                                        <button class="btn btn-primary">Pay 1,000 Now</button>
                                                                    </form>
                                                                </div>
                                                            </div>                              
                                                            <p class="mt-4"><span class="text-danger">*</span> Notify us with your payment details via any of the contact links so we can trace and activate your payment.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-3">
                                            <div class="_sin89lio_thumb col-lg-6 offset-lg-3">
                                                <a href="{{route('preview-cv', $cv->unique_id)}}" target="_blank">
                                                    <button type="submit" class="btn btn-info">Preview Uploaded Cv</button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card shadow rounded custom-card mt-5">
                                            <h2 class="mt-2">Need some help?  Contact {{ env('APP_NAME') }}</h2>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-2 col-2 icon-hold">
                                                        <a href="https://api.whatsapp.com/send?phone={{{$appSettings->site_whatsapp_number}}}"><i class="fa fa-whatsapp"></i></a>
                                                    </div>
                                                    <div class="col-lg-2 col-2 icon-hold">
                                                        <a href="https://t.me/{{$appSettings->site_telegram}}"><i class="fa fa-telegram"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                        <!-- Row -->
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        @include('include.sidebar')                 
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <!-- © 2019 Eliteadmin by themedesigner.in -->

                @include('include.footer')
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
@include('include.e_script')

</body>


</html>