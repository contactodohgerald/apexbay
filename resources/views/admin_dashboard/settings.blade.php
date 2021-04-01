@php 
    $pageName = 'App Settings';
    $settings = 'active';
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
                            <div class="col-lg-12">
                            <h5 class="mt-2 mb-4">App Settings</h5>
                            <form method="POST" action="{{ route('update-settings') }}" enctype="multipart/form-data"> 
                                    @csrf
                                    <div class="work-section container">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="site_name">Site Name</label>
                                                <input type="text" class="form-control" name="site_name" value="{{$appSettings->site_name}}" id="site_name" placeholder="Site Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="site_phone_number">Site PhoneNumber</label>
                                                <input type="text" class="form-control" name="site_phone_number" value="{{$appSettings->site_phone_number}}"  id="site_phone_number" placeholder="Site PhoneNumber">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="site_whatsapp_number">Site Whatsapp Number</label>
                                                <input type="text" class="form-control" name="site_whatsapp_number" value="{{$appSettings->site_whatsapp_number}}" id="site_whatsapp_number" placeholder="Site Whatsapp Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="site_telegram">Site Telegram</label>
                                                <input type="text" class="form-control" name="site_telegram" value="{{$appSettings->site_telegram}}"  id="site_telegram" placeholder="Site Telegram">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="site_mail">Site Email</label>
                                                <input type="email" class="form-control" name="site_mail" value="{{$appSettings->site_mail}}" id="site_mail" placeholder="Site Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="activation_fee">Site Activation Fee</label>
                                                <input type="number" class="form-control" name="activation_fee" value="{{$appSettings->activation_fee}}"  id="activation_fee" placeholder="Site Activation Fee">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="account_name">Site Account Name</label>
                                                <input type="text" class="form-control" name="account_name" value="{{$appSettings->account_name}}" id="account_name" placeholder="Site Account Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="account_number">Site Account Number</label>
                                                <input type="number" class="form-control" name="account_number" value="{{$appSettings->account_number}}"  id="account_number" placeholder="Site Account Number">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="bank_name">Site Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" value="{{$appSettings->bank_name}}" id="bank_name" placeholder="Site Bank Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="site_logo">Site Logo</label>
                                                <input type="file" class="form-control" name="site_logo"  id="site_logo">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <label for="site_address">Site Address</label>
                                            <input type="text" class="form-control" id="site_address" name="site_address" value="{{$appSettings->site_address}}" placeholder="Site Address">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary mt-3">Update Appsettings</button>
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