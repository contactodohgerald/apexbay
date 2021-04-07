@php 
    $pageName = 'home';
    $index = 'active';
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

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="card component-card_1">
                            <div class="card-body">
                                <h3 class="card-title text-center">Total Users</h3>
                                <h5 class="card-text text-center">{{ count($users) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="card component-card_1">
                            <div class="card-body">
                                <h3 class="card-title text-center">Total Product</h3>
                                <p class="card-text text-center">{{ count($ad_count) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="card component-card_1">
                            <div class="card-body">
                                <h3 class="card-title text-center">Total Applications</h3>
                                <p class="card-text text-center">{{ count($cv_count) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Product / Services Transactions</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S / N</th>
                                                <th class="text-center">Full Name</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Payment Channel</th>
                                                <th class="text-center">Payment Type</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(count($transactions) > 0)
                                            @php $count = 1; @endphp
                                            @foreach($transactions as $k => $each_transactions)
                                                <tr>
                                                    <td>
                                                        <div class="td-content customer-name">{{$count}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content customer-name">{{ucfirst($each_transactions->users->name)}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content pricing">
                                                            <span class="">{{number_format($each_transactions->amount)}} ({{$each_transactions->currency}})</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand">{{ucfirst($each_transactions->channel)}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand">{{ucfirst($each_transactions->payment_type)}}</div>
                                                    </td>
                                                    @php if($each_transactions->status === 'confirmed'){
                                                            $status = 'Confirmed';
                                                            $labelColor = 'outline-badge-success';
                                                        }else{
                                                            $status = 'Pending';
                                                            $labelColor = 'outline-badge-danger';
                                                        }
                                                    @endphp
                                                    <td>
                                                        <div class="td-content"><span class="badge {{$labelColor}}">{{$status}}</span></div>
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
                    </div>

                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-three">

                            <div class="widget-heading">
                                <h5 class="">Application / CVs Transactions</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S / N</th>
                                                <th class="text-center">Full Name</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Payment Channel</th>
                                                <th class="text-center">Payment Type</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(count($transactions_cv) > 0)
                                            @php $count = 1; @endphp
                                            @foreach($transactions_cv as $each_transactions_cv)
                                                <tr>
                                                    <td>
                                                        <div class="td-content customer-name">{{$count}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content customer-name">{{ucfirst($each_transactions_cv->users->name)}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content pricing">
                                                            <span class="">{{number_format($each_transactions_cv->amount)}} ({{$each_transactions_cv->currency}})</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand">{{ucfirst($each_transactions_cv->channel)}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand">{{ucfirst($each_transactions_cv->payment_type)}}</div>
                                                    </td>
                                                    @php if($each_transactions_cv->status === 'confirmed'){
                                                            $status = 'Confirmed';
                                                            $labelColor = 'outline-badge-success';
                                                        }else{
                                                            $status = 'Pending';
                                                            $labelColor = 'outline-badge-danger';
                                                        }
                                                    @endphp
                                                    <td>
                                                        <div class="td-content"><span class="badge {{$labelColor}}">{{$status}}</span></div>
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