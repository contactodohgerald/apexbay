@php 
    $pageName = 'Cv Details';
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
                                        <li class="nav-item"> <a class="nav-link" href="{{route('create-ad')}}" >+ Post Product / CVs</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="alert alert-success">
                                                    <h2 class="text-center">This CV can not be seen by the rest of the public upon you activate it with the sum of ₦ 500. <br> <a href="{{route('cv-activation', $cv->unique_id)}}">Click here</a> to activate this product</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <!--second tab-->
                                        <div class="tab-pane active" id="profile" role="tabpanel">
                                            <div class="card-body p-l-3 p-r-3">

                                                <p class="font-bold">{{ucfirst($cv->full_name)}}<a class="text-danger margin-left-20" href="javascript:void(0)"> - {{ucfirst($cv->users->name)}}</a></p>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="m-t-0 text-primary font-bold">₦ {{number_format($cv->price1)}} - {{number_format($cv->price2)}}</h6>
                                                    </div>
                                                    <div class="col-6 align-self-center text-right">
                                                        <p class="text-muted"><i class="fa fa-eye"></i>{{$cv->views}} views</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="flexslider">
                                                            <ul class="slides">
                                                                
                                                                <li data-thumb="{{asset('storage/cover_image/'.$cv->cover_image)}}">
                                                                    <div class="thumb-image"> 
                                                                        <img src="{{asset('storage/cover_image/'.$cv->cover_image)}}" data-imagezoom="true" class="img-responsive"> 
                                                                    </div>
                                                                </li>
                                                                                                                        
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="https://wa.me/234{{substr($cv->whatsapp_phone, 1)}}" type="button" class="btn btn-success m-t-10 full-width green_bg" {{ ($cv->whatsapp_phone == null || $cv->whatsapp_phone == '')?'hidden':'' }}> <i class="fa fa-whatsapp"></i> {{{$cv->whatsapp_phone}}} 
                                                            <object class="btn-svg" data="images/svg/whatsapp.svg" width="20" height="20"> </object>
                                                        </a>
                                                        <br>
                                                        <a href="tel:{{$cv->phone_number}}" type="button" class="btn btn-info m-t-10 full-width blue_bg" {{ ($cv->whatsapp_phone == null || $cv->whatsapp_phone == '')?'hidden':'' }}> <i class="fa fa-phone"></i> {{{$cv->phone_number}}} 
                                                            <object class="btn-svg" data="images/svg/phone.svg" width="20" height="20"> </object>
                                                        </a>
                                                        <br>
                                                        <a href="https://t.me/{{$cv->telegram_username}}" type="button" class="btn btn-info m-t-10 full-width purple_bg" {{ ($cv->whatsapp_phone == null || $cv->whatsapp_phone == '')?'hidden':'' }}> <i class="fa fa-telegram"></i> {{$cv->telegram_username}} 
                                                            <object class="btn-svg" data="images/svg/telegram.svg" width="20" height="20"> </object>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-t-30 bg-orange text-white p-50">
                                                <p class="col-12">
                                                    <span class="font-bold">Choice Of Work:</span>
                                                    {{$cv->cv_category_unique_id}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Work Experience:</span>
                                                    {{$cv->work_experience}} Year</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Job Type:</span>
                                                    {{($cv->job_type == 'full_time')?'Full Time':'Part Time' }}
                                                </p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Gender:</span>
                                                    {{ucfirst($cv->gender)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Marital Status:</span>
                                                    {{ucfirst($cv->marital_status)}}
                                                </p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Age:</span>
                                                    {{ucfirst($cv->age)}} Year</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Education:</span>
                                                    {{ucfirst($cv->education)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Still Studying:</span>
                                                    {{ucfirst($cv->studying_status)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Skills:</span>
                                                    {{ucfirst($cv->skills)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Languages:</span>
                                                    {{ucfirst($cv->language)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Certification:</span>
                                                    {{ucfirst($cv->certification)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Highest Qualification:</span>
                                                    {{ucfirst($cv->qualifications)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Native:</span>
                                                    {{ucfirst($cv->native)}}</p>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Addition Details:</span>
                                                    {{ucfirst($cv->additional_details)}}</p>
                                                <br/>
                                                <h5 class="col-12">₦ {{number_format($cv->price1)}} - {{number_format($cv->price2)}}</h5>
                                                <br/>
                                                <p class="col-12">
                                                    <span class="font-bold">Agent:</span>
                                                    {{ucfirst($cv->users->name)}}
                                                </p>
                                            </div>

                                             <!-- Share start -->
                                             @include('front_end.share')
                                             <!-- Share end -->
                                             
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