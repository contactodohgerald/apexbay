<script>

let baseUrl = 'http://127.0.0.1:8000/';

function postRequest(url, params){

    return new Promise(function (resolve, reject) {
        $.ajaxSetup({
            headers:{
                'Source': "api",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post(url, params, function (data, status, jqXHR) {
            if(status === 'success'){
                resolve(data)
            }else{
                reject(status)
            }
        }).fail(function(error) {//statusText: "Method Not Allowed"
            reject('A Network Error was encountered, message: ``'+error.statusText+'`` was returned. Please contact system administrator.')
        })


    })
}

function getRequest(url) {

    return new Promise(function (resolve, reject) {

        fetch(url)
            .then(res => res.json())
            .then(data => resolve(data))
            .then(err => reject(err));

    });
}

function checkAll() {
    if($(".mainCheckBox").is(':checked')){
        $(".smallCheckBox").prop('checked', true);
    }else{
        $(".smallCheckBox").prop('checked', false);
    }
}

function showSuccessToaster(message, tooastType) {
    if(tooastType === "warning"){
        $.toast({
            text: message,
            heading: 'Note',
            icon: 'warning',
            showHideTransition: 'slide',
            allowToastClose: true,
            hideAfter: 5000,
            stack: 5,
            position: 'top-right',
            textAlign: 'left',
            loader: true,
            loaderBg: '#9ec600',
            background: 'red',
            beforeShow: function () {},
            afterShown: function () {},
            beforeHide: function () {},
            afterHidden: function () {}
        });
    }else if(tooastType === "success"){
        $.toast({
            text: message,
            heading: 'Note',
            icon: 'success',
            showHideTransition: 'slide',
            allowToastClose: true,
            hideAfter: 5000,
            stack: 5,
            position: 'top-right',
            textAlign: 'left',
            loader: true,
            loaderBg: '#9ec600',
            background: 'green',
            beforeShow: function () {},
            afterShown: function () {},
            beforeHide: function () {},
            afterHidden: function () {}
        });
    }
}

</script> 

{{--confirm ads--}}
@php $confirmAds = ['confirm-ads', 'comfirm-cvs', 'all-products', 'all-cvs', 'all-boost-ads'];  @endphp
@php $currentPageName = Request::segment(1); @endphp
@if(in_array($currentPageName, $confirmAds))
    @include('js_files.ads_js')
@endif 

@php $transactions = ['cv-transactions', 'product-transactions'];  @endphp
@php $currentPageName = Request::segment(1); @endphp
@if(in_array($currentPageName, $transactions))
    @include('js_files.transactions')
@endif

@php $admins = ['admin-list'];  @endphp
@php $currentPageName = Request::segment(1); @endphp
@if(in_array($currentPageName, $admins))
    @include('js_files.users_js')
@endif