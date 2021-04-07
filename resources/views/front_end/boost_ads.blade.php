@php 
    $pageName = 'Boost Ad';
    $boostad = 'active';
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
                       @include('front_end.search')    
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
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">

                                            <div class="row">
                                                @if(count($boosted_ads) > 0)
                                                     @foreach($boosted_ads as $ee => $each_ads)
                                                        <div class="col-lg-12 mt-2">
                                                            <div class="container site_color_dark">   
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <ul class="iuhyt_list mt-3">
                                                                            <li><a href="#">Boosted Ads</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-8 offset-lg-2">
                                                                        <div class="image-sector2">
                                                                            @foreach($each_ads->ad_files_get as $oo => $each_image)
                                                                                @if($oo == 1)
                                                                                    @break
                                                                                @endif
                                                                                <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid" alt="{{env('APP_NAME')}}">
                                                                            @endforeach 
                                                                            <h4 class="mt-2 mb-3" style="text-align:center;">
                                                                                <a href="{{route('ad-details', $each_ads->unique_id)}}"  style="color:#fff">{{$each_ads->business_phone}} </a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                       
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
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