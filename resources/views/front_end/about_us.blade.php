@php 
    $pageName = 'About Us';
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
                                                    <h1>About {{ env('APP_NAME') }}</h1>
                                                </div>
                                                <div class="teamgrid-content text-left">
                                                    <div class="container">
                                                        <p><b>{{ env('APP_NAME') }}</b> ltd is in business of making micro, small and medium scale to survive. We support them on product and service promotion or advertising,  Training and outsourcing staff</p>

                                                    <p>Micro, small and medium scale entreprises are the core driver of any economy, therefore repositioning the traditional business model becomes eminent.</p>

                                                    <p>We have identified what we call "the big 3" which must be in a common place under one roof: The are, </p>

                                                    <ol>
                                                        <li>Business owners or Companies.</li>
                                                        <li>Products or Services.</li>
                                                        <li>Job seekers or employees.</li>
                                                    </ol>

                                                    <p>For a decade and counting, we training and outsource staff to our small businesses. 
                                                        Training and retraining staff on common customer service excellence and selling skills, abilty to negotiate your way to close deal in small businesses are key in keeping them afflort.</p>
                                                    </div>
                                                    
                                                </div>

                                                <div class="teamgrid-title">
                                                    <h1>Contact Us</h1>
                                                </div>
                                                <div class="teamgrid-content text-left">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-4 text-center">
                                                                <h2>Email:</h2>
                                                                <p>support@apexbay.com.ng</p>
                                                            </div>
                                                            <div class="col-lg-4 text-center">
                                                                <h2>Phone Number:</h2>
                                                                <p>07054349455</p>
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