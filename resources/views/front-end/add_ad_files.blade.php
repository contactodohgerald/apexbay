@php 
    $pageName = 'Ad File Upload';
    $ads = 'active';
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
			
			<div class="row">
                <div class="col-lg-6 offset-lg-3">
                <div class="extra_ijyu98">
                    <div class="extra_ijyu98_body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <div class="_sin89lio">
                                    <div class="container">
                                        <h3 class="text-center">Upload Image / Video of  Product or Services </h3>
                                        <p class="text-danger">The Image Size should not be more than <b>10mb</b> and the video size shouldn't be more than <b>20 mb</b></p>
                                        <form action="{{route('store-files', $ad->unique_id)}}" class="dropzone">
                                            @csrf
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </form>

                                        <div class="form-group row mt-3">
                                            <div class="_sin89lio_thumb col-lg-6 offset-lg-3">
                                                <a href="#">
                                                    <button type="submit" class="btn btn_update">Done Uploading? Continue</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
			
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
        