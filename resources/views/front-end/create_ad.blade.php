@php 
    $pageName = 'Create Ad';
    $ad = 'active';

    $states = array('Abia','Adamawa','Akwaibom','Anambra','Bauchi','Bayelsa','Benue','Borno','CrossRiver','Delta','Ebonyi','Edo','Ekiti','Enugu','Gombe','Imo','Jigawa','Kaduna','Kano','Kastina','Kebbi','Kogi','Kwara','Lagos','Nasarawa','Niger','Ogun','Ondo','Osun','Oyo','Plateau','Rivers','Sokoto','Taraba','Yobe','Zamfara','Abuja','Other');
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
                        <div class="extra_ijyu98_head">
                            <h4>You are about to Post a New AD - Continue Below</h4>
                        </div>
                        <div class="extra_ijyu98_body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form method="post" action="{{route('store-ad')}}">
                                        @csrf
                                        <div class="_sin89lio">
                                            <div class="container">
                                                <div class="form-group">
                                                    <label for="product_name">Name / Title of product or service <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="product_name" required id="product_name" placeholder="Product / Service Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Describe this resource <span class="text-danger">*</span></label>
                                                    <textarea name="description" class="form-control" required id="description" placeholder="Describe this resource "></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="website_site">(Optional) Website Link : Link to your site or social media</label>
                                                    <input type="text" class="form-control" name="website_site" id="website_site" placeholder="(Optional) Website Link : Link to your site">
                                                </div>
                                                <fieldset>
                                                    <legend>Target Audience:</legend>
                                                    <div class="form-group">
                                                        <label for="country">What Country?</label>
                                                        <input type="text" class="form-control" required id="country" value="Nigeria"  name="country" placeholder="Country" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="state">State? State / Region</label>
                                                        <select class="form-control states" required name="state[]" id="state" multiple>
                                                            @if(count($states) > 0)
                                                                @foreach($states as $kk => $each_state)
                                                                <option value="{{$each_state}}">{{$each_state}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <label for="physical_address">Physical Address <small>(optional)</small> </label>
                                                    <input type="text" class="form-control" name="physical_address" id="physical_address" placeholder="(Optional) Address">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone_number">Business Phone number (Calls)</label>
                                                    <input type="text" class="form-control" required id="phone_number" name="phone_number" placeholder="Phone Number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="whatsapp_phone">WhatsApp Line</label>
                                                    <input type="text" class="form-control" required id="whatsapp_phone" name="whatsapp_phone" placeholder="Whatsapp phone number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telegram_username">Telegram Username (Optional)</label>
                                                    <input type="text" class="form-control" id="telegram_username" name="telegram_username" placeholder="(Optional) Telegram Username">
                                                </div>
                                                <div class="form-group">
                                                    <label for="physical-address">Price / Value of Product or service</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <select name="currency" required class="form-control browser-default">
                                                                <option selected="selected">NGN</option>
                                                            </select>
                                                        </div> 
                                                        <input type="number" id="price" name="price" value="0" placeholder="Price / Value of Product or service" required="required" class="form-control browser-default"> 
                                                        <div class="input-group-append"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="categories">Ad Categories <span class="text-danger">*</span></label>
                                                    <select class="form-control categories" required id="categories" name="categories[]" multiple>
                                                        @if(count($adCategory) > 0)
                                                            @foreach($adCategory as $k => $each_ad_category)
                                                            <option value="{{$each_ad_category->unique_id}}">{{$each_ad_category->ad_category_title}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="_sin89lio_thumb col-lg-12 col-md-12 col-sm-12">
                                                        <button type="submit" class="btn btn_update">Continue To Add Photos</button>
                                                    </div>
                                                </div>
                                            </div>      
                                        </div>
                                    </form>
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
        