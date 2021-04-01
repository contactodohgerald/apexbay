@php 
    $pageName = 'Confirm Products';
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
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S / N</th>
                                            <th class="text-center">
												<input onclick="checkAll()" type="checkbox" class="mainCheckBox" />
											</th>
                                            <th class="text-center">Ad Title</th>
                                            <th class="text-center">User FullName</th>
                                            <th class="text-center">User Phone Number</th>
                                            <th class="text-center">Target Country</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Date Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($ads) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($ads as $k => $each_ads)
                                            <tr>
                                                <td class="text-center">{{$count}}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="smallCheckBox" value="{{$each_ads->unique_id}}">
                                                </td>
                                                <td class="text-center">{{ucfirst($each_ads->ad_title)}}</td>
                                                <td class="text-center">{{ucfirst($each_ads->users->name)}}</td>
                                                <td class="text-center">{{$each_ads->users->phone}}</td>
                                                <td class="text-center">{{ucfirst($each_ads->target_country)}}</td>
                                                @php if($each_ads->status === 'comfirm'){
                                                        $status = 'Confirmed';
                                                        $labelColor = 'success';
                                                    }else{
                                                        $status = 'Pending';
                                                        $labelColor = 'danger';
                                                    }
                                                @endphp
                                                <td class="text-center">
                                                    <button class="btn btn-{{$labelColor}}">{{$status}}</button>
                                                </td>
                                                <td class="text-center">{{$each_ads->created_at->diffForHumans()}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('preview-product', $each_ads->unique_id)}}" target="_blank" title="View" class="btn btn-primary">View Ads</a>
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
                        <button type="button" class="btn btn-primary" id="comfirmAds" title="Select Ad(s) to be confirmed by ticking the checkbox on each row and then click this button to proceed">Confirm Ad(s)</button>

                        <button type="button" class="btn btn-primary" id="deleteAds" title="Select Ad(s) to be deleted by ticking the checkbox on each row and then click this button to proceed">Delete Ad(s)</button>
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