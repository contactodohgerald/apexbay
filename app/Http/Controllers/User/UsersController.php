<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;  
use App\Models\AdFile; 
use App\Models\AdCategory;
use App\Traits\Generics;
use App\Models\User;

class UsersController extends Controller
{
    //

    Use Generics;
    function __construct(AdCategory $adCategory, Ad $ad, AdFile $adFile){
        $this->adCategory = $adCategory;
        $this->ad = $ad;
        $this->adFile = $adFile;
    } 

    function profilePage(){
        $user = Auth::user();

        $ads = $this->ad->getAdByPaginate(10,[
            ['status', '=', 'confirm'],
            ['user_unique_id', '=', $user->unique_id],
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
            'user'=>$user,
            'ads'=>$ads,
        ];
     
        return view('front_end.profile', $view);
    }

    public function updateUserImage(Request $request){
        $user = Auth::user();
       
        try {
            
            if ($request->hasFile('profile_image')) {

                $request->validate([
                    'profile_image' => 'required|file|image|mimes:jpeg,png,gif|max:4048',
                ]);

                if ($user->profile_image !== 'avater.png') {
                    if (file_exists(storage_path('app/public/profile_image/') . $user->profile_image)) {
                        $file_old = storage_path('app/public/profile_image/') . $user->profile_image;
                        unlink($file_old);
                    }
                }

                $file = $request->file('profile_image');
                 
                $profile_image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->storeAs('public/profile_image', $profile_image);

                $user->profile_image = $profile_image;

                if ($user->save()) {
                    return redirect()->back()->with('success', 'Profile image was updated Successfully');
                } else {
                    return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
                }
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()>with('error', $errorsArray);
        }

    }

    public function updateUserBackgroundImage(Request $request){
        $user = Auth::user();
       
        try {
            
            if ($request->hasFile('background_image')) {

                $request->validate([
                    'background_image' => 'required|file|image|mimes:jpeg,png,gif|max:4048',
                ]);

                if ($user->background_image !== 'background_image.png') {
                    if (file_exists(storage_path('app/public/background_image/') . $user->background_image)) {
                        $file_old = storage_path('app/public/background_image/') . $user->background_image;
                        unlink($file_old);
                    }
                }

                $file = $request->file('background_image');
                 
                $profile_image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->storeAs('public/background_image', $profile_image);

                $user->background_image = $profile_image;

                if ($user->save()) {
                    return redirect()->back()->with('success', 'Background image was updated Successfully');
                } else {
                    return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
                }
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()>with('error', $errorsArray);
        }

    }

}
