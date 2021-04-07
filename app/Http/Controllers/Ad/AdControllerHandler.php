<?php

namespace App\Http\Controllers\Ad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\Generics;
use App\Models\Ad;  
use App\Models\Cv;  
use App\Models\AdFile; 
use App\Models\AdCategory;
use App\Models\CvCategory;
use App\Models\ProductComment;
use Illuminate\Support\Facades\Auth;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class AdControllerHandler extends Controller
{
    //
    Use Generics;
    function __construct(
        AdCategory $adCategory, Ad $ad, AdFile $adFile, Cv $cv, CvCategory $cvCategory
        ){
        $this->adCategory = $adCategory;
        $this->cvCategory = $cvCategory;
        $this->ad = $ad;
        $this->adFile = $adFile;
        $this->cv = $cv;
    } 

    public function indexPage(){
        $adCategory = $this->adCategory->getAllAdCategory([
            ['status', '=', 'confirm'],
        ]);

        $ads = $this->ad->getAdByPaginate(10,[
            ['status', '=', 'confirm'],
        ]);

        $boosted_ads = $this->ad->getAllAd([
            ['status', '=', 'confirm'],
        ]);

        $cvs = $this->cv->getCvByPaginate(10,[
            ['status', '=', 'confirm'],
        ]);

        foreach($cvs as $vv => $each_cvs){
            $each_cvs->users;
        }

        foreach($boosted_ads as $rt => $each_boosted_ads){
            $each_boosted_ads->ad_files_get;
        }

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

        $view = [
            'adCategory'=>$adCategory,
            'ads'=>$ads,
            'boosted_ads'=>$boosted_ads,
            'cvs'=>$cvs,
        ];
        return view('front_end.index', $view);
    } 
    
    public function createAd(){
        $adCategory = $this->adCategory->getAllAdCategory([
            ['status', '=', 'confirm'],
        ]);
        $cvCategory = $this->cvCategory->getAllCvCategory([
            ['status', '=', 'confirm'],
        ]);
        $view = [
            'cvCategory'=>$cvCategory,
            'adCategory'=>$adCategory,
        ];
        return view('front_end.create_ad', $view);
    } 

    public function productDetails($unique_id = null){

        if($unique_id != null){
            $ad = $this->ad->getSingleAd([
                ['unique_id', '=', $unique_id]
            ]);

            $ad->views += 1;
            $ad->save();

            $ad->users;
            $ad->product_comment;
            foreach($ad->product_comment as $each_comment){
                $each_comment->users;
            }

            $ads = $this->ad->getAdByPaginate(2,[
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

            $view = [
                'ad'=>$ad,
                'ads'=>$ads,
            ];
            return view('front_end.product_details', $view);
        }
        return view('front_end.product_details');
    }

    public function previewProductDetails($unique_id = null){

        if($unique_id != null){
            $ad = $this->ad->getSingleAd([
                ['unique_id', '=', $unique_id]
            ]);

            $ad->views += 1;
            $ad->save();

            $ad->users;
            $ad->product_comment;
            foreach($ad->product_comment as $each_comment){
                $each_comment->users;
            }

            $ads = $this->ad->getAdByPaginate(2,[
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

            $view = [
                'ad'=>$ad,
                'ads'=>$ads,
            ];
            return view('front_end.preview_product', $view);
        }
        return view('front_end.preview_product');
    }

    public function adFileInterface($unique_id = null){

        if($unique_id != null){
            $ad = $this->ad->getSingleAd([
                ['unique_id', '=', $unique_id]
            ]);

            return view('front_end.add_ad_files', ['ad'=>$ad]);
        }
        return view('front_end.add_ad_files');
    }

    public function storeAdPost(Request $request){
        $data = $request->all();
    
        try {

            $user = Auth::user();

            $unique_id = $this->createUniqueId('ads', 'unique_id');

            $ad = new Ad();
            $ad->unique_id = $unique_id;
            $ad->ad_category_unique_id = $data['categories'];
            $ad->user_unique_id = $user->unique_id;
            $ad->ad_title = $data['product_name'];
            $ad->ad_desc = $data['description'];
            $ad->website_link = $data['website_site'];
            $ad->target_country = $data['country'];
            $ad->target_state = $data['state'];
            $ad->physical_address = $data['physical_address'];
            $ad->business_phone = $data['phone_number'];
            $ad->whatsapp_phone = $data['whatsapp_phone'];
            $ad->telegram_username = $data['telegram_username'];
            $ad->balance = $data['price'];        

            if ($ad->save()) {
                return redirect('/ad-file-upload/'.$unique_id)->with('success', 'Upload Clear Pictures / Video of Your Product / Services');
            } else {
                return redirect('/create-ad')->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect('create-ad')->with('error', $errorsArray);
        }

    }

    public function uploadAdFiles(Request $request, $add_unique_id = null){
        $data = $request->all();

        $num = 0;

        try {
           
            if ($request->hasFile('file')) {

                $file = $request->file('file');

                foreach($file as $each_files){

                    $extention = $each_files->getClientOriginalExtension();
                    
                    $adFiles = new AdFile();

                    $unique_id = $this->createUniqueId('ad_files', 'unique_id');
                   
                    if($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg' || $extention == 'gif'){
                        # code...
                        // $request->validate([
                        //     'file' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:10000',
                        // ]);
    
                        $product_image = md5($each_files->getClientOriginalName() . time()) . "." . $extention;
                        $each_files->storeAs('public/product_image', $product_image);
    
                        $adFiles->unique_id = $unique_id;
                        $adFiles->ad_unique_id = $add_unique_id;
                        $adFiles->ad_files = $product_image;
                        $adFiles->ad_files_type = 'image';

                        $adFiles->save();
                    }elseif($extention == 'mp4' || $extention == 'mkv'){
                        # code...
                        // $request->validate([
                        //     'file' => 'required|mimes:mp4,mkv|max:20000',
                        // ]);
    
                        $product_video = md5($each_files->getClientOriginalName() . time()) . "." . $extention;
                        $each_files->storeAs('public/product_video', $product_video);
    
                        $adFiles->unique_id = $unique_id;
                        $adFiles->ad_unique_id = $add_unique_id;
                        $adFiles->ad_files = $product_video;
                        $adFiles->ad_files_type = 'video';

                        $adFiles->save();
                    }

                    $num = 1;
                }

                if ($num == 1) {
                    return redirect()->back()->with('success', 'Files successfully uploaded');
                } else {
                    return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
                }

            }

        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()->with('error', $errorsArray);
        }

    }
}
