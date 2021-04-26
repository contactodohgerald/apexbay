@php 
    $pageName = 'All Boost Ads';
    $boost = 'active';
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
                            <h1>All Boost Ads</h1>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S / N</th>
                                            <th class="text-center">
												<input onclick="checkAll()" type="checkbox" class="mainCheckBox" />
											</th>
                                            <th class="text-center">Phone Number</th>
                                            <th class="text-center">Ad Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Date Created</th>
                                            {{-- <th class="text-center">Action</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($boostAd) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($boostAd as $k => $each_boostAd)
                                            <tr>
                                                <td class="text-center">{{$count}}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="smallCheckBox" value="{{$each_boostAd->unique_id}}">
                                                </td>
                                                <td class="text-center">{{$each_boostAd->phone_number}}</td>
                                                <td class="text-center">
                                                    <span class="profile-img">
                                                        <img src="{{asset('storage/boost_add/'.$each_boostAd->add_image)}}" alt="{{ env('APP_NAME') }}" style="height: 50px; width:50px">
                                                    </span>
                                                </td>
                                                <td class="text-center"><button class="btn btn-{{ ($each_boostAd->status == 'on')?'success':'danger' }}">{{$each_boostAd->status}}</button></td>
                                                <td class="text-center">{{$each_boostAd->created_at->diffForHumans()}}</td>
                                                {{-- <td class="text-center">
                                                    <a href="{{route('admin-profile-page', $each_boostAd->unique_id)}}" title="View" class="btn btn-primary">View Admin</a>
                                                </td> --}}
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
                        <button type="button" class="btn btn-danger" id="onBoostAd" title="Select Ad(s) to be on by ticking the checkbox on each row and then click this button to proceed">On Ad(s) Status</button>
                        <button type="button" class="btn btn-danger" id="offBoostAd" title="Select Ad(s) to be off by ticking the checkbox on each row and then click this button to proceed">Off Ad(s) Status</button>
                        <button type="button" class="btn btn-danger" id="deleteBoostAd" title="Select Ad(s) to be deleted by ticking the checkbox on each row and then click this button to proceed">Delete Ad(s)</button>
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