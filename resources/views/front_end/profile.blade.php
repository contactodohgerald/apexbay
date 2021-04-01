@php 
    $pageName = 'Profile Page';
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
                                        <li class="nav-item"> <a class="nav-link" href="/">Products & Services</a> </li>
                                        <li class="nav-item"> <a class="nav-link active" href="{{route('create-ad')}}">+ POST NEW AD</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="container">
                                                        <div class="card">
                                                            <div class="sideBarImageHold" style="background:url({{ asset('storage/background_image/'.auth()->user()->background_image) }})">
                                                                <center>
                                                                    <div class="sideBarImage">
                                                                        <img src="{{asset('storage/profile_image/'.auth()->user()->profile_image)}}" alt="{{env('APP_NAME')}}">
                                                                    </div>
                                                                </center>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-6">
                                                                    <form action="{{ route('update-image') }}" class="mt-5" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="profile_image">Profile Image</label>
                                                                            <input type="file" class="form-control" id="profile_image" name="profile_image" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button class="btn btn-info" type="submit">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                <div class="col-lg-6 col-6">
                                                                    <form action="{{ route('background-update') }}" class="mt-5" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="background_image">Background</label>
                                                                            <input type="file" class="form-control" id="background_image" name="background_image" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button class="btn btn-info" type="submit">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="row bg-orange text-white p-50">
                                                        <h5 class="col-12">
                                                            <span class="font-bold">Full Name:</span>
                                                            {{ Str::ucfirst($user->name) }}</h5>
                                                        <br/>
                                                        <h5 class="m-t-30 col-12">
                                                            <span class="font-bold">User Name:</span>
                                                            {{ Str::ucfirst($user->user_name) }}</h5>
                                                        <br/>
                                                        <h5 class="m-t-30 col-12">
                                                            <span class="font-bold">Email:</span>
                                                            {{ $user->email }}
                                                        </h5>
                                                        <br/>
                                                        <h5 class="m-t-30 col-12">
                                                            <span class="font-bold">Phone:</span>
                                                            {{ $user->phone }}
                                                        </h5>
                                                        <br/>
                                                        <h5 class="m-t-30 col-12">
                                                            <span class="font-bold">Country:</span>
                                                            {{ Str::ucfirst($user->country) }}</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="container">
                                                <h4><b>Uploaded Products / Services for {{ Str::ucfirst($user->name) }} </b></h4>
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
                                            @endif
                                           
                                        </div>
                                        <!--second tab-->
                                       
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