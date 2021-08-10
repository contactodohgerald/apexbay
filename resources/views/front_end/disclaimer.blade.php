@php 
    $pageName = 'Disclaimer';
    $price = 'active';
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
                                    <!-- Tab panes -->
                                    <div class="tab-content">               
                                        <div class="team-grid">
                                            <div class="container">
                                                <div class="teamgrid-title">
                                                    <h1>DISCLAIMER</h1>
                                                </div>
                                                <div class="teamgrid-content text-left">
                                                    <div class="container">
                                                      <p>
                                                        Except as expressly stated in an agreement between you and  {{ env('APP_NAME') }} ltd, all content, services, products, applicants or persons provided on this software are provided ‘as is’ without warranty of any kind, either expressed or implied,  {{ env('APP_NAME') }} ltd disclaim all warranties, expressed or implied including , without limitation, those of merchantability, fitness for a particular purpose and no infringement.
                                                      </p>

                                                        <p>
                                                            “You” the applicant and “You” the employer are solely responsible for the appropriateness of the software, its contents, products and services, applicants or persons offered on the software, for your intended application and use.
                                                        </p>
                                                        
                                                        <p>
                                                            {{ env('APP_NAME') }} ltd does not warrant that the software, its content, or the product and services, applicants or persons  it offers on the software meet your requirements. Subject to the terms of any agreement between you and  {{ env('APP_NAME') }} ltd, its suppliers and licensors shall not be liable for any direct, indirect, special, consequential, incidental, or punitive damages.
                                                        </p>
                                                        
                                                        <p>
                                                            {{ env('APP_NAME') }} ltd permits applicants or persons, company to register and promote vendors’ products, or skills, but  {{ env('APP_NAME') }} ltd does not make any representation or give any warrantee, responsibility of any kind for the end users.
                                                        </p>
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