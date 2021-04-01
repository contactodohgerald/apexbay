@php 
    $pageName = 'Confirm CVs';
    $cv = 'active';
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
                                            <th class="text-center">Full Name</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Age</th>
                                            <th class="text-center">Price Range</th>
                                            <th class="text-center">Work Experience</th>
                                            <th class="text-center">Job Type</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Date Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($cvs) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($cvs as $k => $each_cvs)
                                            <tr>
                                                <td class="text-center">{{$count}}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="smallCheckBox" value="{{$each_cvs->unique_id}}">
                                                </td>
                                                <td class="text-center">{{ucfirst($each_cvs->full_name)}}</td>
                                                <td class="text-center">{{ucfirst($each_cvs->gender)}}</td>
                                                <td class="text-center">{{$each_cvs->age}} Years</td>
                                                <td class="text-center">{{number_format($each_cvs->price1)}} - {{number_format($each_cvs->price2)}}</td>
                                                <td class="text-center">{{$each_cvs->work_experience}} Years</td>
                                                <td class="text-center">{{($each_cvs->job_type == 'full_time')?'Full Time':'Part Time'}}</td>
                                                @php if($each_cvs->status === 'comfirm'){
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
                                                <td class="text-center">{{$each_cvs->created_at->diffForHumans()}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('preview-cv', $each_cvs->unique_id)}}" target="_blank" title="View" class="btn btn-primary">View Cvs</a>
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
                        <button type="button" class="btn btn-primary" id="comfirmCvs" title="Select Cv(s) to be confirmed by ticking the checkbox on each row and then click this button to proceed">Confirm Cv(s)</button>

                        <button type="button" class="btn btn-primary" id="deleteCvs" title="Select Cv(s) to be deleted by ticking the checkbox on each row and then click this button to proceed">Delete Cv(s)</button>
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