<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}} - {{$pageName}}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('front_end/assets/images/favicon.png') }}"/>
    <link href="{{asset('admin_dashboard/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin_dashboard/assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admin_dashboard/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_dashboard/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

      <!--  BEGIN CUSTOM STYLE FILE  -->
      <link href="{{ asset('admin_dashboard/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('admin_dashboard/assets/css/elements/infobox.css') }}" rel="stylesheet" type="text/css" />
      <!--  END CUSTOM STYLE FILE  -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('admin_dashboard/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_dashboard/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

     <!-- BEGIN PAGE LEVEL STYLES -->
     <link rel="stylesheet" type="text/css" href="{{asset('admin_dashboard/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_dashboard/plugins/table/datatable/dt-global_style.css')}}">

    
    <link href="{{asset('toast/jquery.toast.css')}}" rel="stylesheet">
    <!-- END PAGE LEVEL STYLES -->

</head>