<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;  
use App\Models\Cv; 
use Illuminate\Support\Facades\DB;
use App\Models\AdCategory;

class SearchQueryController extends Controller
{
    //
    function __construct(Ad $ad, Cv $cv, AdCategory $adCategory){
        $this->adCategory = $adCategory;
        $this->ad = $ad;
        $this->cv = $cv;
    }



    public function searchThroughTable(Request $request){

        $search = $request->search_records;
        $query = Ad::query();
        $columns = ['ad_title', 'ad_desc', 'target_country', 'target_state'];
        foreach($columns as $column){
            $query->orWhere($column, 'LIKE', '%' . $search . '%');
        }
        $ads_search_result = $query->get();
        $cv_query = Cv::query();
        $cv_columns = ['full_name', 'job_type', 'language', 'native'];
        foreach($cv_columns as $single_column){
            $cv_query->orWhere($single_column, 'LIKE', '%' . $request->search_records . '%');
        }
        $cv_search_result = $cv_query->get();

        $cvs = $this->cv->getCvByPaginate(10,[
            ['status', '=', 'confirm'],
        ]);
        foreach($cvs as $vv => $each_cvs){
            $each_cvs->users;
        }

        $ads = $this->ad->getAdByPaginate(10,[
            ['status', '=', 'confirm'],
        ]);
        $ad_category_array = [];

        $image_count = [];

        $video_count = [];
        foreach($ads as $vv => $each_ads){
            $each_ads->ad_files_get;

            foreach($each_ads->ad_files_get as $h => $file_counts){

                if($file_counts->ad_files_type == 'image'){
        
                    array_push($image_count, $file_counts);
                }

                if($file_counts->ad_files_type == 'video'){
        
                    array_push($video_count, $file_counts);
                }


            }
            $each_ads->image_count = $image_count;

            $each_ads->video_count = $video_count;

            $explode = explode('++', $each_ads->ad_category_unique_id);
            foreach($explode as $cx => $each_explode){
               $ad_category = $this->adCategory->getSingleAdCategory([
                    ['unique_id', '=', $each_explode],
                ]);

                array_push($ad_category_array, $ad_category);
            }
            $each_ads->ad_category = $ad_category_array;

            $each_ads->users;
           
        }


        $views = [
            'search'=>$search,
            'ads_search_result'=>$ads_search_result,
            'cv_search_result'=>$cv_search_result,
            'cvs'=>$cvs,
            'ads'=>$ads,
        ];
       
        return view('front_end.search_results', $views);

    }

}
