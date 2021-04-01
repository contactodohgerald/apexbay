@php 
    $pageName = 'View Admins List';
    $ad = 'active';
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

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <h1>Admins</h1>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S / N</th>
                                            <th class="text-center">
												<input onclick="checkAll()" type="checkbox" class="mainCheckBox" />
											</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">UserName</th>
                                            <th class="text-center">Phone Number</th>
                                            <th class="text-center">Profile Image</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Account Type</th>
                                            <th class="text-center">Date Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($user) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($user as $k => $each_user)
                                            <tr>
                                                <td class="text-center">{{$count}}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="smallCheckBox" value="{{$each_user->unique_id}}">
                                                </td>
                                                <td class="text-center">{{ucfirst($each_user->name)}}</td>
                                                <td class="text-center">{{ucfirst($each_user->user_name)}}</td>
                                                <td class="text-center">{{$each_user->phone}}</td>
                                                <td class="text-center">
                                                    <span class="profile-img">
                                                        <img src="{{asset('storage/profile_image/'.$each_user->profile_image)}}" alt="{{ env('APP_NAME') }}" style="height: 50px; width:50px">
                                                    </span>
                                                </td>
                                                <td class="text-center">{{$each_user->email}}</td>
                                                <td class="text-center">{{ucfirst($each_user->user_type)}}</td>
                                                <td class="text-center">{{$each_user->created_at->diffForHumans()}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('ad-details', $each_user->unique_id)}}" target="_blank" title="View" class="btn btn-primary">View Admin</a>
                                                </td>
                                            </tr>
                                            @php $count++ @endphp
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center ">No Records Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div style="position: fixed; bottom: 30px; right: 30px; z-index: 200">
                        <button type="button" class="btn btn-primary" id="deleteAdmin" title="Select Admin(s) to be deleted by ticking the checkbox on each row and then click this button to proceed">Delete Admin(s)</button>
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