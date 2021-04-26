 <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
 <script src="{{asset('admin_dashboard/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('admin_dashboard/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('admin_dashboard/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin_dashboard/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('admin_dashboard/assets/js/custom.js')}}"></script>

    <!-- Snackbar toaster -->
    <script src="{{ asset('js-snackbar/dist/js-snackbar.js') }}"></script>
    <script src="{{ asset('js-snackbar/dist/site.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{asset('toast/jquery.toast.js')}}"></script>
    <!-- Snackbar toaster -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin_dashboard/plugins/table/datatable/datatables.js')}}"></script>
    <script>        
        $('#default-ordering').DataTable( {
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "order": [[ 3, "desc" ]],
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7,
            drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
	    } );
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

    @include('sweetalert::alert')

    @include('layouts.js_by_page')

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('admin_dashboard/plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin_dashboard/assets/js/dashboard/dash_1.js')}}"></script>

    <script src="{{asset('countdown-plugin/jquery.countdown.min.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->