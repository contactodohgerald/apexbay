@php 
    $pageName = 'home';
    $index = 'active';
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

			<!-- ============================ Newest Designs Start ==================================== -->
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="row">
						<div class="col-lg-12">
							<div class="container white">
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
						</div>
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

					<div class="row">
						<div class="col-lg-12">
							<div class="container white">
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Newest Designs End ==================================== -->
			
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
        