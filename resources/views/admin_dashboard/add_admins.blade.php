@php 
    $pageName = 'Add Admins';
    $admin = 'active';
@endphp
@include('layouts.head')
<body>

    <!--  BEGIN NAVBAR  -->
    @include('layouts.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>
        
        <!--  BEGIN SIDEBAR  -->
        @include('layouts.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">                
                <div class="account-settings-container layout-top-spacing">
                    <div class="account-content">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h5 class="mt-2 mb-4">Craete Admin Account</h5>
                                <form method="POST" action="{{ route('store-admin') }}" enctype="multipart/form-data"> 
                                    @csrf
                                    <div class="work-section container">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="admin_name">Admin Name</label>
                                                <input type="text" class="form-control" name="admin_name" required  id="admin_name" placeholder="Admin Name">
                                            </div>
                                        </div> 
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="email">Admin Email</label>
                                                <input type="email" class="form-control" name="email" required  id="email" placeholder="Email">
                                            </div>
                                        </div>  
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="username">Admin User Name</label>
                                                <input type="text" class="form-control" name="username" required  id="username" placeholder="User Name">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="phone">Admin PhoneNumber</label>
                                                <input type="text" class="form-control" name="phone" required  id="phone" placeholder="User Phone">
                                            </div>
                                        </div>
                                        <div class="alert alert-danger text-center">
                                            <h3 style="color: maroon">The Default Password for admin is : <b>1234567890</b></h3>
                                        </div>     
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="password">Admin Default Password</label>
                                                <input type="password" class="form-control" name="password" required  id="password" placeholder="Password" value="1234567890" readonly>
                                            </div>
                                        </div>                                             
                                        <button type="submit" class="btn btn-primary mt-3">Create Admin Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>                            

            @include('layouts.footer')

        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('layouts.e_script')

</body>

</html>