@php 
    $pageName = 'Ad Details';
    $single_ads = 'active';
@endphp
<!-- ============================ Head  Start ================================== -->
@include('includes.head')
<!-- ============================ Head End ================================== -->
			
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
        <!-- ============================ Header  Start ================================== -->
          @include('includes.header')
        <!-- ============================ Header End ================================== -->

            <!-- ========================== Blog Detail Elements ============================= -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <section class="gray-light">
                        <div class="container">
                            <div class="row">
                                <!-- Blog Detail -->
                                <div class="col-lg-12">
                                    
                                    <div class="blog-details single-post-item format-standard">
                                        <div class="post-details">

                                            <h2 class="mt-3">{{ucfirst($ad->ad_title)}}</h2>
                                            <div class="item_inner-caption">
                                                <div class="inner-caption_flex">
                                                    <p class="text-danger"><b>{{number_format($ad->balance)}} NGN</b></p>
                                                </div>
                                                <div class="item_inner-last">
                                                    <div class="item_list_links">
                                                        <p><i class="fa fa-eye"></i> <b>{{$ad->views}} Views</b></p>
                                                    </div>
                                                </div>
											</div>
                                            <div class="post-featured-img">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-8 offset-lg-2">
                                                            <div class="row">
                                                                @foreach($ad->ad_files_get as $each_image)
                                                                    <div class="col-lg-12 mt-1">
                                                                        <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid" alt="{{env('APP_NAME')}}">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 offset-lg-2">
                                                            <div class="contact_help_line purple_bg">
                                                                <a href="https://api.whatsapp.com/send?phone={{{$ad->business_phone}}}">{{$ad->business_phone}} <i class="fa fa-phone"></i></a>
                                                            </div>
                                                            <div class="contact_help_line green_bg">
                                                                <a href="#">{{$ad->whatsapp_phone}} <i class="fa fa-whatsapp"></i></a>
                                                            </div>
                                                            <div class="contact_help_line blue_bg">
                                                                <a href="#">{{$ad->telegram_username}} <i class="fa fa-telegram" aria-hidden="false"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <h3 class="mt-3">{{ucfirst($ad->users->name)}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row site_color_dark">
                                        <div class="col-lg-12">
                                            <div class="container textWhite"> 
                                                <h3 class="textWhite">Description: </h3>
                                                <p>{{$ad->ad_desc}}</p>
                                                <h3 class="textWhite">Address: </h3>
                                                <p>{{$ad->physical_address}}</p>
                                                <h3 class="textWhite">WebSite Link: </h3>
                                                <p><a class="textWhite" href="{{$ad->website_link}}" target="_blank">{{$ad->website_link}}</a></p>
                                                <h3 class="textWhite">Product Status: </h3>
                                                <p>{{$ad->status}}</p>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <!-- Blog Comment -->
                                    <div class="blog-details single-post-item format-standard">
                                        
                                        <div class="comment-area">
                                            <div class="all-comments">
                                                <h3 class="comments-title">{{count($ad->product_comment)}} Comments</h3>
                                                <div class="comment-list">
                                                     @if(count($ad->product_comment) > 0)
                                                        <ul>
                                                            @foreach($ad->product_comment as $each_comments)
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
                                                    <form method="post" action="{{route('post-comment', $ad->unique_id)}}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <textarea name="comment" required class="form-control" cols="30" rows="6" placeholder="Type your comments...."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn theme-bg rounded full-width">Add Comment</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <h2>Similar Ads</h2>
                                        @if(count($ads) > 0)
                                            @foreach($ads as $ee => $each_ads)
                                                <div class="row box_shadow">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="image-sector">
                                                        @foreach($each_ads->ad_files_get as $oo => $each_image)
                                                        
                                                            @if($oo == 1)
                                                                @break
                                                            @endif
                                                            <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid" alt="{{env('APP_NAME')}}">
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <h2 class="mt-3">
                                                            <a href="{{route('ad-details', $each_ads->unique_id)}}">{{ucfirst($each_ads->ad_title)}} </a>
                                                        </h2>
                                                        <div class="item_info_bmc"><i> by </i>
                                                            <a class="author_bmv" href="javascript:;">gerald</a>
                                                        </div>
                                                        <p>{{substr($each_ads->ad_desc, 0, 100)}}... <a href="{{route('ad-details', $each_ads->unique_id)}}">Read more</a> </p>
                                                        <div>
                                                            <h2 class="text-danger">NGN {{number_format($each_ads->balance)}}</h2>
                                                        </div>
                                                        <hr>
                                                        <div class="item_inner-caption">
                                                            <div class="inner-caption_flex">
                                                                <p><i class="fa fa-eye"></i> <b>{{$each_ads->views}} Views</b></p>
                                                            </div>
                                                            <div class="item_inner-last">
                                                                <div class="item_list_links">
                                                                    <p><b>{{$each_ads->created_at->diffForHumans()}}</b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

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
                    </section>
                </div>
            </div>
			<!-- ========================== Blog Detail Elements ============================= -->		
			
			
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
        