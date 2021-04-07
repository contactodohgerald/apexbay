@php 
    $pageName = 'Create Ad';
    $ad = 'active';

    $states = array('Abia','Adamawa','Akwaibom','Anambra','Bauchi','Bayelsa','Benue','Borno','CrossRiver','Delta','Ebonyi','Edo','Ekiti','Enugu','Gombe','Imo','Jigawa','Kaduna','Kano','Kastina','Kebbi','Kogi','Kwara','Lagos','Nasarawa','Niger','Ogun','Ondo','Osun','Oyo','Plateau','Rivers','Sokoto','Taraba','Yobe','Zamfara','Abuja','Other');
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
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#create-cvs" role="tab">Post Products & Services</a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"> Post Work CVs</a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!--second tab-->
                                        <div class="tab-pane active" id="create-cvs" role="tabpanel">
                                            <div class="card-body p-l-3 p-r-3">
                                                <div class="m-2">
                                                    <h2 class="text-center">
                                                        <b>Post Product or Service</b>
                                                    </h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <form method="post" action="{{route('store-ad')}}">
                                                            @csrf
                                                            <div class="_sin89lio">
                                                                <div class="container">
                                                                    <div class="form-group">
                                                                        <label for="product_name">Name of product / service</label>
                                                                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Name of product / service">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Describe product / service </label>
                                                                        <textarea name="description" class="form-control" id="description" rows="6" placeholder="Describe product / service "></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="website_site">Website Link : Link to your site or social media</label>
                                                                        <input type="text" class="form-control" name="website_site" id="website_site" placeholder="Website Link : Link to your site">
                                                                    </div>
                                                                    <fieldset>
                                                                        <legend>Target Audience:</legend>
                                                                        <div class="form-group">
                                                                            <label for="country">What Country?</label>
                                                                            <input type="text" class="form-control" id="country" value="Nigeria"  name="country" placeholder="Country" readonly>
                                                                        </div>
                    
                                                                        <div class="form-group">
                                                                            <label for="state">State? State / Region </label>
                                                                            <select class="form-control states" name="state" id="state">
                                                                                @if(count($states) > 0)
                                                                                    <option value="">Please Select</option>
                                                                                    @foreach($states as $kk => $each_state)
                                                                                    <option value="{{$each_state}}">{{$each_state}}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="form-group">
                                                                        <label for="physical_address">Physical Address</label>
                                                                        <input type="text" class="form-control" name="physical_address" id="physical_address" placeholder="Address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phone_number">Business Phone number (Calls)</label>
                                                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="whatsapp_phone">WhatsApp Line</label>
                                                                        <input type="text" class="form-control" id="whatsapp_phone" name="whatsapp_phone" placeholder="Whatsapp phone number">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="telegram_username">Telegram Username</label>
                                                                        <input type="text" class="form-control" id="telegram_username" name="telegram_username" placeholder="Telegram Username">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="physical-address">Price / Value of Product or service</label>
                                                                        <div class="input-group mb-2">
                                                                            <div class="input-group-prepend">
                                                                                <select name="currency" class="form-control browser-default">
                                                                                    <option selected="selected">NGN</option>
                                                                                </select>
                                                                            </div> 
                                                                            <input type="number" id="price" name="price" value="0" placeholder="Price / Value of Product or service" class="form-control browser-default"> 
                                                                            <div class="input-group-append"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="categories">Ad Categories <span class="text-danger">*</span></label>
                                                                        <select class="form-control categories" id="categories" name="categories">
                                                                            @if(count($adCategory) > 0)
                                                                                <option value="">Please Select</option>
                                                                                @foreach($adCategory as $k => $each_ad_category)
                                                                                <option value="{{$each_ad_category->unique_id}}">{{$each_ad_category->ad_category_title}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="_sin89lio_thumb col-lg-12 col-md-12 col-sm-12">
                                                                            <button type="submit" class="btn btn-primary">Continue To Add Photos</button>
                                                                        </div>
                                                                    </div>
                                                                </div>      
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            <div class="card-body p-l-3 p-r-3">
                                                <div class="m-2">
                                                    <h2 class="text-center">
                                                        <b> Post Jobs</b>
                                                    </h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <form method="post" action="{{route('store-cv')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="_sin89lio">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="full_name">Full Name </label>
                                                                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="gender">Gender </label>
                                                                                <select name="gender" id="gender" class="form-control">
                                                                                    <option value="">Please Select</option>
                                                                                    <option value="male">Male</option>
                                                                                    <option value="female">Female</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="marital_status">Marital Status </label>
                                                                                <select name="marital_status" id="marital_status" class="form-control" >
                                                                                    <option value="">Please Select</option>
                                                                                    <option value="single">Single</option>
                                                                                    <option value="married">Married</option>
                                                                                    <option value="divorce">Divorce</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="age">Age</label>
                                                                                <input type="number" class="form-control" name="age" id="age" placeholder="Age">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="work_experience">Working Experience</label>
                                                                                <input type="number" class="form-control" name="work_experience" id="work_experience" placeholder="Working Experience">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="job_type">Job Type </label>
                                                                                <select name="job_type" id="job_type" class="form-control">
                                                                                    <option value="">Please Select</option>
                                                                                    <option value="full_time">Full Time</option>
                                                                                    <option value="part_time">Part Time</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="studying_status">Still Studying?</label>
                                                                                <select name="studying_status" id="studying_status" class="form-control">
                                                                                    <option value="">Please Select</option>
                                                                                    <option value="yes">Yes</option>
                                                                                    <option value="no">No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="education">Eduction</label>
                                                                                <input type="text" class="form-control" name="education" id="education" placeholder="Eduction (E.g: what school you attended)">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="education">Skills <small>(seprate each skills with a comma)</small></label>
                                                                                <input type="text" class="form-control" name="skills" id="skills" placeholder="Skills">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="language">Languages <small>(seprate each languages with a comma)</small></label>
                                                                                <input type="text" class="form-control" name="language" id="language" placeholder="Languages">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="certification">Certifications</label>
                                                                                <input type="text" class="form-control" name="certification" id="certification" placeholder="Certifications">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="qualifications">Highest Qualification </label>
                                                                                <select name="qualifications" id="qualifications" class="form-control">
                                                                                    <option value="">Please Select</option>
                                                                                    <option value="phd">PHD</option>
                                                                                    <option value="masters">MASTERS</option>
                                                                                    <option value="degree">DEGREES</option>
                                                                                    <option value="hnd">HND</option>
                                                                                    <option value="ond">OND</option>
                                                                                    <option value="nce">NCE</option>
                                                                                    <option value="ssce">SSCE </option>
                                                                                    <option value="none">NONE</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="native">Native</label>
                                                                                <input type="text" class="form-control" name="native" id="native" placeholder="Native">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="phone_number">Phone number (Calls)</label>
                                                                                <input type="text" class="form-control"  id="phone_number" name="phone_number" placeholder="Phone Number">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="whatsapp_phone">WhatsApp Line </label>
                                                                                <input type="text" class="form-control" id="whatsapp_phone" name="whatsapp_phone" placeholder="Whatsapp phone number">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="telegram_username">Telegram Username </label>
                                                                                <input type="text" class="form-control" id="telegram_username" name="telegram_username" placeholder="Telegram Username">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="physical-address">Expected Salary </label>
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <input type="number" id="price1" name="price1"placeholder="From" class="form-control browser-default"> 
                                                                                    </div> 
                                                                                    <input type="number" id="price2" name="price2" placeholder="To" class="form-control browser-default"> 
                                                                                    <div class="input-group-append"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="cv-categories">Cv Categories </label>
                                                                                <select class="form-control cv-categories" id="cv-categories" name="cv-categories">
                                                                                    @if(count($cvCategory) > 0)
                                                                                        <option value="">Please Select</option>
                                                                                        @foreach($cvCategory as $k => $each_cv_category)
                                                                                        <option value="{{$each_cv_category->unique_id}}">{{$each_cv_category->cv_category_title}}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="additional_details">Addition Details </label>
                                                                                <textarea name="additional_details" class="form-control" id="additional_details" placeholder="Addition Details" rows="6"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="cover_image">Cover Image </label>
                                                                                <input type="file" id="cover_image" name="cover_image" class="form-control"> 
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <div class="_sin89lio_thumb">
                                                                                    <button type="submit" class="btn btn-info">Continue To Add Photos</button>
                                                                                </div>
                                                                            </div>
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