@php 
    $pageName = 'Cv Counter';
    $ad = 'active';
@endphp
@include('layouts.head')
<style>
    ul#example {
    list-style: none;
    margin: 50px 0;
    padding: 0;
    display: block;
    text-align: center;
    }

    ul#example li { display: inline-block; }

    ul#example li span {
    font-size: 80px;
    font-weight: 300;
    line-height: 80px;
    }

    ul#example li.seperator {
    font-size: 80px;
    line-height: 70px;
    vertical-align: top;
    }

    ul#example li p {
    color: #a7abb1;
    font-size: 25px;
}
</style>
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
                                    <ul id="example">
                                        <li><span class="days">00</span><p class="days_text">Days</p></li>
                                        <li class="seperator">:</li>
                                        <li><span class="hours">00</span><p class="hours_text">Hours</p></li>
                                        <li class="seperator">:</li>
                                        <li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
                                        <li class="seperator">:</li>
                                        <li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
                                      </ul>
                                        
                                    <thead>
                                        <tr>
                                            <th class="text-center">S / N</th>
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
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">{{ucfirst($cv->full_name)}}</td>
                                            <td class="text-center">{{ucfirst($cv->gender)}}</td>
                                            <td class="text-center">{{$cv->age}} Years</td>
                                            <td class="text-center">{{number_format($cv->price1)}} - {{number_format($cv->price2)}}</td>
                                            <td class="text-center">{{$cv->work_experience}} Years</td>
                                            <td class="text-center">{{($cv->job_type == 'full_time')?'Full Time':'Part Time'}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success">{{($cv->status === 'comfirm')?'Comfirmed':'Comfirmed'}}</button>
                                            </td>
                                            <input type="hidden" id="counter_date" value="{{ $cv->duration_period }}">
                                            <td class="text-center">{{$cv->created_at->diffForHumans()}}</td>
                                            <td class="text-center">
                                                <a href="{{route('preview-cv', $cv->unique_id)}}" target="_blank" title="View" class="btn btn-primary">View Cvs</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
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

    <script>

    let counterDate = $("#counter_date").val();

    $('#example').countdown({
    date: counterDate
    }, function () {
    console.log('Expired!!!');
    });

    </script>

    

</body>

</html>