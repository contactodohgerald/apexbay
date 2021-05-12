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
                                        <li class="nav-item"> <a class="nav-link" href="{{ '/' }}">Products & Services</a> </li>
                                        <li class="nav-item"> <a class="nav-link active" href="{{ route('index-page') }}">Seeking Work - CVs</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                       
                                        <!--second tab-->
                                        <div class="tab-pane active" id="profile" role="tabpanel">
                                            <div class="row">
                                                @if(count($boosted_cvs) > 0)
                                                @foreach($boosted_cvs as $each_cvs)
                                                <div class="col-lg-12 mt-2">
                                                        <div class="container site_color_dark">   
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <ul class="iuhyt_list mt-3">
                                                                        <li><a href="{{ route('boost-cv') }}">Boosted Cvs</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-8 offset-lg-2">
                                                                    <div class="image-sector2">
                                                                        <div class="row">
                                                                            <div class="col-md-12" style="width: 100%; height: 250px;">
                                                                                <img src="{{asset('storage/boost_cvs/'.$each_cvs->boost_cv_image)}}" class="img-fluid" alt="{{env('APP_NAME')}}" style="width: 100%; height: 100%;">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                            <h2 class="mt-2 mb-3" style="text-align:center;">
                                                                                <a href="javascript:;"  style="color:#fff">{{$each_cvs->phone_number}} </a>
                                                                            </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                                                       
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12" id="post-data-cv">
                                                    @include('front_end.data')
                                                </div>

                                                <div class="col-md-12 text-center mb-2">
                                                    <div class="ajax-load-cv" style="display: none">
                                                        <p><img src="{{ asset('loader.gif') }}" alt="{{ env('APP_NAME') }}" width="50" height="50"> Loading More Jobs ...</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                @if(count($boosted_cvs) > 0)
                                                @foreach($boosted_cvs as $each_cvs)
                                                <div class="col-lg-12 mt-2">
                                                        <div class="container site_color_dark">   
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <ul class="iuhyt_list mt-3">
                                                                        <li><a href="{{ route('boost-cv') }}">Boosted Cvs</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-8 offset-lg-2">
                                                                    <div class="image-sector2">
                                                                        <div class="row">
                                                                            <div class="col-md-12" style="width: 100%; height: 250px;">
                                                                                <img src="{{asset('storage/boost_cvs/'.$each_cvs->boost_cv_image)}}" class="img-fluid" alt="{{env('APP_NAME')}}" style="width: 100%; height: 100%;">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                            <h2 class="mt-2 mb-3" style="text-align:center;">
                                                                                <a href="javascript:;"  style="color:#fff">{{$each_cvs->phone_number}} </a>
                                                                            </h2>
                                                                            </div>
                                                                        </div>
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

  <script type="text/javascript">
    var ENDPOINT = "{{ url('/') }}"
    var page = 1;
    $(window).scroll(function() {
        
        if (elementInViewport2(document.querySelector('#theFooter'))) {
            // The element is visible, do something
            page++;
            loadMoreCvData(page);
        } 

    }); 
    
</script>

</body>


</html>