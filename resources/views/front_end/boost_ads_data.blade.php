@if(count($boosted_ads) > 0)
@foreach($boosted_ads as $each_ads)
   <div class="col-lg-12 mt-2">
       <div class="container site_color_dark">   
           <div class="row">
               <div class="col-lg-12">
                   <ul class="iuhyt_list mt-3">
                       <li><a href="{{ route('boost-ad') }}">Boosted Ads</a></li>
                   </ul>
               </div>
               <div class="col-lg-8 offset-lg-2">
                   <div class="image-sector2">
                       <div class="row">
                           <div class="col-md-12" style="width: 100%; height: 250px;">
                                <img src="{{asset('storage/boost_add/'.$each_ads->add_image)}}" class="img-fluid" alt="{{env('APP_NAME')}}" style="width: 100%; height: 100%;">
                           </div>
                           <div class="col-md-12">
                            <h2 class="mt-2 mb-3" style="text-align:center;">
                                <a href="javascript:;"  style="color:#fff">{{$each_ads->phone_number}} </a>
                            </h2>
                           </div>
                       </div>
                   </div>
               </div>
           </div>                                                       
       </div>
   </div>
@endforeach
@endif