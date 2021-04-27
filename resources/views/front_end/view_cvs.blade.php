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
                                                        <a href="https://api.whatsapp.com/send?phone={{$cv->whatsapp_phone}}" type="button" class="btn btn-success m-t-10 full-width green_bg" {{ ($cv->whatsapp_phone == null || $cv->whatsapp_phone == '')?'hidden':'' }}> <i class="fa fa-whatsapp"></i> {{{$cv->whatsapp_phone}}} 
                                                            <object class="btn-svg" data="images/svg/whatsapp.svg" width="20" height="20"> </object>
                                                        </a>
                                                        <br>
                                                        <a href="tel:{{$cv->phone_number}}" type="button" class="btn btn-info m-t-10 full-width blue_bg" {{ ($cv->phone_number == null || $cv->phone_number == '')?'hidden':'' }}> <i class="fa fa-phone"></i> {{{$cv->phone_number}}} 
                                                            <object class="btn-svg" data="images/svg/phone.svg" width="20" height="20"> </object>
                                                        </a>
                                                        <br>
                                                        <a href="https://t.me/{{$cv->telegram_username}}" type="button" class="btn btn-info m-t-10 full-width purple_bg" {{ ($cv->telegram_username == null || $cv->telegram_username == '')?'hidden':'' }}> <i class="fa fa-telegram"></i> {{$cv->telegram_username}} 
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
                                                <p class=" col-12">
                                                    <span class="font-bold">Job Type:</span>
                                                    {{($cv->job_type == 'full_time')?'Full Time':'Part Time' }}
                                                </p>
                                                <br/>
                                                <p class=" col-12">
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

                                              <!-- Blog Comment -->
                                            <div class="blog-details single-post-item format-standard container">
                                                
                                                <div class="comment-area">
                                                    <div class="all-comments">
                                                        <h3 class="comments-title">{{count($cv->cv_comment)}} Comments</h3>
                                                        <div class="comment-list">
                                                            @if(count($cv->cv_comment) > 0)
                                                                <ul>
                                                                    @foreach($cv->cv_comment as $each_comments)
                                                                    <li class="single-comment">
                                                                        <article>
                                                                            <div class="comment-author">
                                                                                <img src="{{asset('storage/profile_image/'.$each_comments->users->profile_image)}}" alt="{{env('APP_NAME')}}">
                                                                            </div>
                                                                            <div class="comment-details">
                                                                                <div class="comment-meta">
                                                                                    <div class="comment-left-meta">
                                                                                        <h4 class="author-name">{{ucfirst($each_comments->users->name)}} <span class="selected"><i class="fa fa-bookmark"></i></span></h4>
                                                                                        <div class="comment-date">{{$each_comments->created_at->diffForHumans()}}</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment-text">
                                                                                    <p>{{$each_comments->comment}}</p>
                                                                                </div>
                                                                            </div>
                                                                        </article>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <div class="alert alert-success text-center">No comment is avaliable for this Product at the moment</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="comment-box submit-form">
                                                        <h3 class="reply-title">Post Comment</h3>
                                                        <div class="comment-form">
                                                            <form method="post" action="{{route('post-cv-comment', $cv->unique_id)}}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                                                        <div class="form-group">
                                                                            <textarea name="comment" required class="form-control" cols="30" rows="6" placeholder="Type your comments...."></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-info m-t-10 full-width">Add Comment</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            
                                            <h5 class="m-t-20 m-b-10 m-l-40 font-bold">Similar Ads</h5>
                                            {{-- @if(count($cvs) > 0)
                                                @foreach($cvs as $ss => $each_cvs)
                                                    @if ($cv->unique_id == $each_cvs->unique_id)
                                                        @continue                                                        
                                                    @endif
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
                                                                <a class="page-link" href="{{$cvs->previousPageUrl()}}" aria-label="Previous">
                                                                <span class="ti-arrow-left"></span>
                                                                <span class="sr-only">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item active"><a class="page-link" href="javascript:;">{{$cvs->currentPage()}}</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="{{$cvs->nextPageUrl()}}" aria-label="Next">
                                                                <span class="ti-arrow-right"></span>
                                                                <span class="sr-only">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @else
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="alert alert-success text-center mt-5">
                                                        <h3>They arent any similar ad's avaliable yet</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif --}}

                                            <div class="row">
                                                <div class="col-md-12" id="post-data">
                                                    @include('front_end.data')
                                                </div>

                                                <div class="col-md-12 text-center mb-2">
                                                    <div class="ajax-load" style="display: none">
                                                        <p><img src="{{ asset('loader.gif') }}" alt="{{ env('APP_NAME') }}" width="50" height="50"> Loading More Jobs ...</p>
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