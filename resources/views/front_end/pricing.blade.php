@php 
    $pageName = 'Pricing';
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
                                        <li class="nav-item"> <a class="nav-link active" href="/">Products & Services</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('create-ad')}}" >+ POST NEW AD</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="card-body p-l-3 p-r-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="alert alert-success">
                                                    <h3><b class="text-danger">Note: </b> <br><br> Activation fee for Product / Services is <b>₦ 1200</b> for Six (6) months <br><br> Activation fee for Job seekers / employment is <b>₦ 1000</b> for three (3) months</h3>
                                                </div>
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