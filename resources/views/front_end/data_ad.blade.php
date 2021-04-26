@foreach($ads as $ee => $each_ads)
<div class="card shadow rounded custom-card">
    <div class="row g-0">
        <div class="col-4 col-lg-3">
            <a href="{{route('ad-details', $each_ads->unique_id)}}">
                @foreach($each_ads->ad_files_get as $oo => $each_image)

                @if($oo == 1)
                    @break
                @endif
                <img src="{{asset('storage/product_image/'.$each_image->ad_files)}}" class="img-fluid imageFit" alt="{{env('APP_NAME')}}">
                @endforeach
            </a>
        </div>
        <div class="col-8 col-lg-9">
            <div class="card-body">
                <h5 class="card-title no-margin-bottom textBlack">
                    <a href="{{route('ad-details', $each_ads->unique_id)}}">{{ucfirst($each_ads->ad_title)}}</a>
                </h5>
                <p class="card-text">
                    <small class="text-danger font-bold">- {{ ucfirst($each_ads->users->name) }}</small>
                </p>
                <p class="font14">{{substr($each_ads->ad_desc, 0, 80)}}... <a href="{{route('ad-details', $each_ads->unique_id)}}">Read more</a></p>
                <p class="card-text text-primary font-bold">₦ {{number_format($each_ads->balance)}}</p>
                
                <div class="like-comm">
                    <small class="text-muted"><i class="fa fa-eye"></i>{{$each_ads->views}} views</small>
                    <small class="text-muted"><i class="fa fa-circle font-size-half"></i>{{$each_ads->created_at->diffForHumans()}}</small> 
                </div>
                
            </div>
        </div>
    </div>
</div>
@endforeach