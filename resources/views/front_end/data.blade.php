@foreach($cvs as $each_cvs)
<div class="card shadow rounded custom-card">
    <div class="row g-0">
        <div class="col-4 col-lg-3">
            <a href="{{route('cv-details', $each_cvs->unique_id)}}">
                <img src="{{asset('storage/cover_image/'.$each_cvs->cover_image)}}" class="img-fluid imageFit" alt="{{env('APP_NAME')}}">
            </a>
        </div>
        <div class="col-8 col-lg-9">
            <div class="card-body">
                <h5 class="card-title no-margin-bottom textBlack">
                    <a href="{{route('cv-details', $each_cvs->unique_id)}}">{{ucfirst($each_cvs->full_name)}}</a>
                </h5>
                <p class="card-text">
                    <small class="text-danger font-bold">- {{ ucfirst($each_cvs->users->name) }}</small>
                </p>
                <p class="font14"><b>{{$each_cvs->cv_category_unique_id}}</p>
                <p class="font14"><b>Job Type:</b> {{ ($each_cvs->job_type == 'full_time')?'Full Time':'Part Time' }}</p>
                <p class="card-text text-primary font-bold">₦ {{number_format($each_cvs->price1)}} - {{number_format($each_cvs->price2)}}</p>
                
                <div class="like-comm">
                    <small class="text-muted"><i class="fa fa-eye"></i>{{$each_cvs->views}} views</small>
                    <small class="text-muted"><i class="fa fa-circle font-size-half"></i>{{$each_cvs->created_at->diffForHumans()}}</small> 
                </div>
                
            </div>
        </div>
    </div>
</div>
@endforeach