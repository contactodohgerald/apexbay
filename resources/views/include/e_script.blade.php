<script src="{{ asset('front_end/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('front_end/assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{ asset('front_end/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('front_end/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{ asset('front_end/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{ asset('front_end/dist/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{ asset('front_end/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{ asset('front_end/assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('front_end/dist/js/custom.min.js')}}"></script>

<link href="{{ asset('front_end/dist/css/kc.fab.css')}}" rel="stylesheet">
<div class="kc_fab_wrapper"></div>
<script src="{{ asset('front_end/dist/js/kc.fab.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<!--Flexslider JavaScript -->
<script src="{{ asset('front_end/js/jquery.flexslider.js')}}"></script>
<script src="{{ asset('front_end/js/imagezoom.js')}}"></script>

<script src="{{asset('dropzone/dist/dropzone.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@include('sweetalert::alert')

<script>

function elementInViewport2(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;

    while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
    }

    return (
    top < (window.pageYOffset + window.innerHeight) &&
    left < (window.pageXOffset + window.innerWidth) &&
    (top + height) > window.pageYOffset &&
    (left + width) > window.pageXOffset
    );
}

function loadMoreAdData(page){
    $.ajax({
        url: ENDPOINT + "?page=" + page,
        type:'get',
        beforeSend: function(){
            $('.ajax-load').show();
        }
    })
    .done(function(data){
        if(data.html == ""){
        $('.ajax-load').html("No more records found");
        return;
        }
    $('.ajax-load').hide();
    $("#post-data-ad").append(data.html);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError){
        $('.ajax-load').html("Server no responding...");
    });
} 

function loadMoreCvData(page){
    $.ajax({
        url: ENDPOINT + "/index-page?page=" + page,
        type:'get',
        beforeSend: function(){
            $('.ajax-load-cv').show();
        }
    })
    .done(function(data){
        if(data.html == ""){
            $('.ajax-load-cv').html("No more records found");
            return;
        }
        $('.ajax-load-cv').hide();
        $("#post-data-cv").append(data.html);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError){
        $('.ajax-load-cv').html("Server no responding...");
    });
} 

function loadMoreBoostadsData(page){
    $.ajax({
        url: ENDPOINT + "/boost-cv?page=" + page,
        type:'get',
        beforeSend: function(){
            $('.ajax-load').show();
        }
    })
    .done(function(data){
        if(data.html == ""){
            $('.ajax-load').html("No more records found");
            return;
        }
        $('.ajax-load').hide();
        $("#boost-ads-data").append(data.html);
        console.log(data); return;
    })
    .fail(function(jqXHR, ajaxOptions, thrownError){
        $('.ajax-load').html("Server no responding...");
    });
} 

function loadBoostAdsData(page){
    $.ajax({
        url: ENDPOINT + "/boost-ad?page=" + page,
        type:'get',
        beforeSend: function(){
            $('.ajax-load').show();
        }
    })
    .done(function(data){
        if(data.html == ""){
            $('.ajax-load').html("No more records found");
            return;
        }
        $('.ajax-load').hide();
        $("#boost-ads-data").append(data.html);
        console.log(data); return;
    })
    .fail(function(jqXHR, ajaxOptions, thrownError){
        $('.ajax-load').html("Server no responding...");
    });
} 

</script>

<script>

    $(document).ready(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });

        // $('.states').select2({
        //     placeholder: 'Select an option'
        // });

        // $('.categories').select2({
        //     placeholder: 'Select an option'
        // });
    
    })

    var links = [
            {
            "bgcolor":"#2F3192",
            "icon":"+"
            },
            {
            "url":"login",
            "bgcolor":"#FF8C00",
            "color":"#fffff",
            "title":"Login",
            "icon":"<i class='fa fa-sign-in'></i>"
            },
            {
            "url":"pricing",
            "bgcolor":"#808080",
            "color":"#fffff",
            "title":"Pricing",
            "icon":"<i class='fa fa-money'></i>"
            },
            {
            "url":"create-ad",
            "bgcolor":"#DB4A39",
            "color":"#fffff",
            "title":"Post Product Ads",
            "icon":"<i class='fa fa-location-arrow'></i>"
            },
            {
            "url":"create-ad",
            "bgcolor":"#263238",
            "color":"white",
            "title":"Post Work",
            "icon":"<i class='fa fa-file'></i>"
            }
        ]
    $('.kc_fab_wrapper').kc_fab(links);
</script>    