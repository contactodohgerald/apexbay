@php 
    $pageName = 'Cv Transactions';
    $transaction = 'active';
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
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Payment Channel</th>
                                            <th class="text-center">Payment Type</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Date Created</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($transactions) > 0)
                                        @php $count = 1; @endphp
                                        @foreach($transactions as $k => $each_transactions)
                                            <tr>
                                                <td class="text-center">{{$count}}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="smallCheckBox" value="{{$each_transactions->unique_id}}">
                                                </td>
                                                <td class="text-center">{{ucfirst($each_transactions->users->name)}}</td>
                                                <td class="text-center">{{$each_transactions->users->email}}</td>
                                                <td class="text-center">{{number_format($each_transactions->amount)}} ({{$each_transactions->currency}})</td>
                                                <td class="text-center">{{ucfirst($each_transactions->channel)}}</td>
                                                <td class="text-center">{{ucfirst($each_transactions->payment_type)}}</td>
                                                @php if($each_transactions->status === 'confirmed'){
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
                                                <td class="text-center">{{$each_transactions->created_at->diffForHumans()}}</td>
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
                        <button type="button" class="btn btn-primary" id="deleteTransactions" title="Select Transaction(s) to be deleted by ticking the checkbox on each row and then click this button to proceed">Delete Transaction(s)</button>
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