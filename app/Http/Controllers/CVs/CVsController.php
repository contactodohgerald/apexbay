<?php

namespace App\Http\Controllers\CVs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\Generics; 
use Carbon\Carbon;
use App\Models\Ad;  
use App\Models\Cv;  
use App\Models\AdFile; 
use App\Models\AdCategory;
use Illuminate\Support\Facades\Auth;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class CVsController extends Controller
{
    //
    Use Generics;

    function __construct(
        Cv $cv, AdCategory $adCategory, Ad $ad, AdFile $adFile
        ){
        $this->middleware('auth', ['except' => ['comfirmCvsStatus', 'deleteCvsStatus', 'cvDetailsInterface']]);
        $this->adCategory = $adCategory;
        $this->ad = $ad;
        $this->adFile = $adFile;
        $this->cv = $cv;
    }

    public function viewCvInterface(){
        $cvs = $this->cv->getAllCv([
            ['status', '=', 'pending'],
        ]);

        foreach($cvs as $vv => $each_cvs){
            $each_cvs->users;
        }

        return view('admin_dashboard.view_cvs', ['cvs'=>$cvs]);
    }

    public function cvDetailsInterface($unique_id = null){

        if($unique_id != null){
            $cv = $this->cv->getSingleCv([
                ['unique_id', '=', $unique_id]
            ]);

            $cv->views += 1;
            $cv->save();

            $cv->users;
            $cv->cv_comment;
            foreach($cv->cv_comment as $each_cv_comment){
                $each_cv_comment->users;
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
                'ads'=>$ads,
                'cv'=>$cv,
            ];
         
            return view('front_end.view_cvs', $view);
        }
        return view('front_end.view_cvs');
    }

    public function previewCVDetailPage($unique_id = null){

        if($unique_id != null){
            $cv = $this->cv->getSingleCv([
                ['unique_id', '=', $unique_id]
            ]);

            $cv->views += 1;
            $cv->save();

            $cv->users;
            $cv->cv_comment;
            foreach($cv->cv_comment as $each_cv_comment){
                $each_cv_comment->users;
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
                'ads'=>$ads,
                'cv'=>$cv,
            ];
         
            return view('front_end.preview_cv', $view);
        }
        return view('front_end.preview_cv');
    }

    //full_name gender marital_status age work_experience job_type studying_status education skills language certification qualifications native phone_number whatsapp_phone telegram_username price1 price2 additional_details cover_image

    public function storeCv(Request $request){
        $data = $request->all();

        $user = Auth::user();
        
        try {
            
            if ($request->hasFile('cover_image')) {

                $request->validate([
                    'cover_image' => 'required',
                ]);
                $file = $request->file('cover_image');
                $cover_image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->storeAs('public/cover_image', $cover_image);

            }else{
                $cover_image = 'avater.png';
            }

            $cvs = new Cv();

            $unique_id = $this->createUniqueId('cvs', 'unique_id');
            
            $cvs->unique_id = $unique_id;
            $cvs->user_unique_id = $user->unique_id;
            $cvs->cv_category_unique_id = $data['cv-categories'];
            $cvs->full_name = $data['full_name']; 
            $cvs->gender  = $data['gender'];
            $cvs->marital_status = $data['marital_status'];
            $cvs->age  = $data['age'];
            $cvs->work_experience  = $data['work_experience'];
            $cvs->job_type  = $data['job_type'];
            $cvs->studying_status  = $data['studying_status'];
            $cvs->education  = $data['education'];
            $cvs->skills  = $data['skills'];
            $cvs->language  = $data['language'];
            $cvs->certification  = $data['certification'];
            $cvs->qualifications  = $data['qualifications'];
            $cvs->native  = $data['native'];
            $cvs->phone_number  = $data['phone_number'];
            $cvs->whatsapp_phone  = $data['whatsapp_phone'];
            $cvs->telegram_username = $data['telegram_username']; 
            $cvs->price1  = $data['price1'];
            $cvs->price2  = $data['price2'];
            $cvs->additional_details  = $data['additional_details'];
            $cvs->cover_image = $cover_image;
          
            if ($cvs->save()) {
                return redirect('/cv-activation/'.$unique_id)->with('success', 'Cv Was Successfully Created');
            } else {
                return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()->with('error', $errorsArray);
        }

    }

    function handleValidations(array $data)
    {

        $validator = Validator::make($data, [
            'dataArray' => 'required|string'
        ]);

        return $validator;
    }

    public function comfirmCvsStatus(Request $request){
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);
  
            foreach ($dataArray as $eachDataArray) {

                //update the ad status to confirmed
                $cv = $this->cv->selectSingleCv($eachDataArray);
                $cv->status = 'confirm';
                $cv->activation_date = Carbon::now()->toDateTimeString();
                $cv->save();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Cv has been confirmed successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }

    public function deleteCvsStatus(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                //update the ad status to confirmed
                $cv = $this->cv->selectSingleCv($eachDataArray);
                $cv->delete();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Cv has been deleted successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }


   
}
