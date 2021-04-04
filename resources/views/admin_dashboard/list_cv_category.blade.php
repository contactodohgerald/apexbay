@php 
    $pageName = 'Cv Categories List';
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
                                            <th class="text-center">Category Title</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Date Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($cvCategory) > 0)
                                            @php $count = 1; @endphp
                                            @foreach($cvCategory as $gg => $each_category)
                                                <tr>
                                                    <td class="text-center">{{$count}}</td>
                                                    <td class="text-center">{{ucfirst($each_category->cv_category_title)}}</td>
                                                    <td class="text-center"><button class="btn btn-{{($each_category->status == 'confirm')?'success':'danger'}}">{{ucfirst($each_category->status)}}</button> </td>
                                                    <td class="text-center">{{$each_category->created_at->diffForHumans()}}</td>
                                                    <td class="text-center"><a href="{{route('edit-cv-category', $each_category->unique_id)}}" class="btn btn-primary">Edit</a> </td>
                                                </tr>
                                            @php $count++ @endphp
                                            @endforeach
                                        @else
                                            <tr><div class="alert alert-success text-center">No Cv Category is available at this time</div></tr>
                                        @endif
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

    

</body>

</html>