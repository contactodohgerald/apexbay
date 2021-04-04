@php 
    $pageName = 'Edit Profile Page';
    $profile = 'active';

     $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
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
                            <div class="col-lg-7">
                                <h5 class="mt-2 mb-2">Update Account</h5>
                                <form method="POST" action="{{ route('update-profile') }}"> 
                                    @csrf
                                    <div class="work-section container">
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" required  id="name" placeholder="Name" value="{{ $users->name }}">
                                            </div>
                                        </div> 
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="username">User Name</label>
                                                <input type="text" class="form-control" name="username" required  id="username" placeholder="User Name" value="{{ $users->user_name }}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" name="phone" required  id="phone" placeholder="Phone" value="{{ $users->phone }}">
                                            </div>
                                        </div>  
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" name="gender"  id="gender">
                                                    <option value="">Please Select</option>
                                                    <option {{ ($users->gender == 'male')?'selected':'' }} value="male">Male</option>
                                                    <option {{ ($users->gender == 'female')?'selected':'' }} value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="country">Country</label>
                                                <select class="form-control" name="country"  id="country">
                                                    <option value="">Please Select</option>
                                                    @if(count($countries) > 0)
                                                        @foreach ($countries as $each_countries)
                                                            <option {{ ($each_countries == $users->country)?'selected':'' }} value="{{ $each_countries }}">{{ $each_countries }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                                                                      
                                        <button type="submit" class="btn btn-primary">Update Account</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-5">
                                <h5 class="mt-2 mb-2">Update Account Password</h5>
                                <form method="POST" action="{{ route('update-password') }}"> 
                                    @csrf
                                    <div class="work-section container">
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" class="form-control" name="current_password" required  id="current_password" placeholder="Current Password">
                                            </div>
                                        </div> 
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="password">New Password</label>
                                                <input type="password" class="form-control" name="password" required  id="password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="form-group col-md-12">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation" required  id="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>                                                                                        
                                        <button type="submit" class="btn btn-primary">Update Password</button>
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