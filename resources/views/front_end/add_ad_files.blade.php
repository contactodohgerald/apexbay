@php 
    $pageName = 'home';
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
                    <div class="container-fluid">
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
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Products & Services</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="{{route('create-ad')}}">+ POST NEW AD</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <div class="_sin89lio">
                                                <div class="container">
                                                    <h2 class="text-center mt-4">Upload Image / Video of  Product or Services </h2>
                                                    <p class="text-danger">The Image Size should not be more than <b>10mb</b> and the video size shouldn't be more than <b>20 mb</b></p>
                                                    <form action="{{route('store-files', $ad->unique_id)}}" class="dropzone">
                                                        @csrf
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple />
                                                        </div>
                                                    </form>
            
                                                    <div class="form-group row mt-3">
                                                        <div class="_sin89lio_thumb col-lg-6 offset-lg-3">
                                                            <a href="{{route('product-activation', $ad->unique_id)}}">
                                                                <button type="submit" class="btn btn-info">Activate Uploaded Product / Services</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-3">
                                                        <div class="_sin89lio_thumb col-lg-6 offset-lg-3">
                                                            <a href="{{route('preview-product', $ad->unique_id)}}" target="_blank">
                                                                <button type="submit" class="btn btn-info">Preview Uploaded Product / Services</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="alert alert-success text-center">
                                                                <h3>Note <span class="text-danger">*</span> <br>
                                                                    Click the activate button above to activate this product / services for it to be accessed by the rest of the public. After successfull activation, send us a prove of payment and our team of admins will confirm the payment and activate the status of yournproduct / services for the rest of the public to view it<br>
                                                                    You can always preview it by clicking the button above.
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!--second tab-->
                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            
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