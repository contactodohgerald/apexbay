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
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Seeking Work - CVs</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            @if(count($ads) > 0)
									            @foreach($ads as $ee => $each_ads)
                                                    <div class="card shadow rounded custom-card">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-lg-3">
                                                                <a href="{{route('ad-details', $each_ads->unique_id)}}">
                                                                    @foreach($each_ads->ad_files_get as $oo => $each_image)
                                                    
                                                                    @if($oo == 1)
                                                                        @break
                                                                    @endif
                                                                    <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid imageFit" alt="{{env('APP_NAME')}}">
                                                                    @endforeach
                                                                </a>
                                                            </div>
                                                            <div class="col-8 col-lg-9">
                                                                <div class="card-body">
                                                                    <h5 class="card-title no-margin-bottom textBlack">
                                                                        <a href="{{route('ad-details', $each_ads->unique_id)}}">{{ucfirst($each_ads->ad_title)}}</a>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <small class="text-danger font-bold">- {{ ucfirst($each_ads->users->name) }}</small>
                                                                    </p>
                                                                    <p class="font14">{{substr($each_ads->ad_desc, 0, 80)}}... <a href="{{route('ad-details', $each_ads->unique_id)}}">Read more</a></p>
                                                                    <p class="card-text text-primary font-bold">₦ {{number_format($each_ads->balance)}}</p>
                                                                    
                                                                    <div class="like-comm">
                                                                        <small class="text-muted"><i class="fa fa-eye"></i>{{$each_ads->views}} views</small>
                                                                        <small class="text-muted"><i class="fa fa-circle font-size-half"></i>{{$each_ads->created_at->diffForHumans()}}</small> 
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="container site_color_dark">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <ul class="iuhyt_list mt-3">
                                                                    <li><a href="#">Boosted Ads</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-8 offset-lg-2">
                                                                @if(count($ads) > 0)
                                                                    @foreach($ads as $ee => $each_ads)
                                                                        @if($ee == 1)
                                                                            @break
                                                                        @endif
                                                                        <div class="image-sector2">
                                                                            @foreach($each_ads->ad_files_get as $oo => $each_image)
                                                                                @if($oo == 1)
                                                                                    @break
                                                                                @endif
                                                                                <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid" alt="{{env('APP_NAME')}}">
                                                                            @endforeach
                                                                            <h4 class="mt-2 mb-3" style="text-align:center;">
                                                                                <a href="{{route('ad-details')}}" style="color:#fff">{{$each_ads->business_phone}} </a>
                                                                            </h4>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(count($ads) > 0)
                                                @foreach($ads as $ee => $each_ads)
                                                    <div class="card shadow rounded custom-card">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-lg-3">
                                                                <a href="{{route('ad-details', $each_ads->unique_id)}}">
                                                                    @foreach($each_ads->ad_files_get as $oo => $each_image)
                                                    
                                                                    @if($oo == 1)
                                                                        @break
                                                                    @endif
                                                                    <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid imageFit" alt="{{env('APP_NAME')}}">
                                                                    @endforeach
                                                                </a>
                                                            </div>
                                                            <div class="col-8 col-lg-9">
                                                                <div class="card-body">
                                                                    <h5 class="card-title no-margin-bottom textBlack">
                                                                        <a href="{{route('ad-details', $each_ads->unique_id)}}">{{ucfirst($each_ads->ad_title)}}</a>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <small class="text-danger font-bold">- {{ ucfirst($each_ads->users->name) }}</small>
                                                                    </p>
                                                                    <p class="font14">{{substr($each_ads->ad_desc, 0, 80)}}... <a href="{{route('ad-details', $each_ads->unique_id)}}">Read more</a></p>
                                                                    <p class="card-text text-primary font-bold">₦ {{number_format($each_ads->balance)}}</p>
                                                                    
                                                                    <div class="like-comm">
                                                                        <small class="text-muted"><i class="fa fa-eye"></i>{{$each_ads->views}} views</small>
                                                                        <small class="text-muted"><i class="fa fa-circle font-size-half"></i>{{$each_ads->created_at->diffForHumans()}}</small> 
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <ul class="pagination mt-0">
                                                        <li class="page-item">
                                                            <a class="page-link" href="{{$ads->previousPageUrl()}}" aria-label="Previous">
                                                            <span class="ti-arrow-left"></span>
                                                            <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item active"><a class="page-link" href="javascript:;">{{$ads->currentPage()}}</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="{{$ads->nextPageUrl()}}" aria-label="Next">
                                                            <span class="ti-arrow-right"></span>
                                                            <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                        
                                        </div>
                                        <!--second tab-->
                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            @if(count($cvs) > 0)
                                                @foreach($cvs as $ss => $each_cvs)
                                                    <div class="card shadow rounded custom-card">
                                                        <div class="row g-0">
                                                            <div class="col-4 col-lg-3">
                                                                <a href="{{route('cv-details', $each_cvs->unique_id)}}">
                                                                    <img src="{{asset('storage/cover_image/'.$each_cvs->cover_image)}}" class="img-fluid imageFit" alt="{{env('APP_NAME')}}">
                                                                </a>
                                                            </div>
                                                            <div class="col-8 col-lg-9">
                                                                <div class="card-body">
                                                                    <h5 class="card-title no-margin-bottom textBlack">
                                                                        <a href="{{route('cv-details', $each_cvs->unique_id)}}">{{ucfirst($each_cvs->full_name)}}</a>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <small class="text-danger font-bold">- {{ ucfirst($each_cvs->users->name) }}</small>
                                                                    </p>
                                                                    <p class="font14"><b>Work Experience:</b> {{ $each_cvs->work_experience }} Years</p>
                                                                    <p class="font14"><b>Job Type:</b> {{ ($each_cvs->job_type == 'full_time')?'Full Time':'Part Time' }}</p>
                                                                    <p class="card-text text-primary font-bold">₦ {{number_format($each_cvs->price1)}} - {{number_format($each_cvs->price2)}}</p>
                                                                    
                                                                    <div class="like-comm">
                                                                        <small class="text-muted"><i class="fa fa-eye"></i>{{$each_cvs->views}} views</small>
                                                                        <small class="text-muted"><i class="fa fa-circle font-size-half"></i>{{$each_cvs->created_at->diffForHumans()}}</small> 
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <ul class="pagination mt-0">
                                                            <li class="page-item">
                                                                <a class="page-link" href="{{$ads->previousPageUrl()}}" aria-label="Previous">
                                                                <span class="ti-arrow-left"></span>
                                                                <span class="sr-only">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item active"><a class="page-link" href="javascript:;">{{$ads->currentPage()}}</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="{{$ads->nextPageUrl()}}" aria-label="Next">
                                                                <span class="ti-arrow-right"></span>
                                                                <span class="sr-only">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="container site_color_dark">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <ul class="iuhyt_list mt-3">
                                                                    <li><a href="#">Boosted Ads</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-8 offset-lg-2">
                                                                @if(count($ads) > 0)
                                                                    @foreach($ads as $ee => $each_ads)
                                                                        @if($ee == 1)
                                                                            @break
                                                                        @endif
                                                                        <div class="image-sector2">
                                                                            @foreach($each_ads->ad_files_get as $oo => $each_image)
                                                                                @if($oo == 1)
                                                                                    @break
                                                                                @endif
                                                                                <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid" alt="{{env('APP_NAME')}}">
                                                                            @endforeach
                                                                            <h4 class="mt-2 mb-3" style="text-align:center;">
                                                                                <a href="{{route('ad-details')}}" style="color:#fff">{{$each_ads->business_phone}} </a>
                                                                            </h4>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
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