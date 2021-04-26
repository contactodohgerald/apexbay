<?php

namespace App\Http\Controllers\Ad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Traits\Generics;
use App\Models\AdCategory;
use App\Models\Ad;  
use App\Models\User;  
use Exception;
use RealRashid\SweetAlert\Facades\Alert;


class AdController extends Controller
{
    //
    Use Generics;

    function __construct(AdCategory $adCategory, Ad $ad){
        $this->middleware('auth', ['except' => ['comfirmAdsStatus', 'deleteAdsStatus']]);
        $this->adCategory = $adCategory;
        $this->ad = $ad;
    }
    
    public function createAdCategory(){
        return view('admin_dashboard.ad_category');
    }

    public function confirmAdsInterface(){
        $ads = $this->ad->getAllAd([
            ['status', '=', 'pending'],
        ]);

        foreach($ads as $vv => $each_ads){
            $each_ads->users;
        }

        return view('admin_dashboard.comfirm_ads', ['ads'=>$ads]);
    }

    public function getAllproducts(){
        $ads = $this->ad->getAllAd([
            ['status', 'confirm'],
        ]);

        foreach($ads as $vv => $each_ads){
            $each_ads->users;
        }

        return view('admin_dashboard.all_products', ['ads'=>$ads]);
    }  
    
    public function productCounter($unique_id = null){
        if($unique_id != null){
            $ads = $this->ad->getSingleAd([
                ['unique_id', $unique_id],
            ]);
          
            $ads->users;

           // return $ads;
          
            return view('admin_dashboard.product_counter', ['ads'=>$ads]);
        }else{
            exit(404);
        }
    }


    public function allAdCategory(){
        $adCategory = $this->adCategory->getAllAdCategory([
            ['status', '=', 'confirm'],
        ]);
        return view('admin_dashboard.list_category', ['adCategory'=>$adCategory]);
    } 

    public function singleAdCategory($unique_id = null){

        if($unique_id != null){
            $adCategory = $this->adCategory->getSingleAdCategory([
                ['unique_id', '=', $unique_id],
            ]);
            return view('admin_dashboard.edit_category', ['adCategory'=>$adCategory]);
        }else{
            exit(404);
        }
    }

    protected function Validator($request)
    {

        $this->validator = Validator::make($request->all(), [
            'category_title' => 'required',
            'description' => 'required',
        ]);
    }

    public function storeAdCategory(Request $request){
        $data = $request->all();

        try {
            $this->Validator($request); //validate fields

            $unique_id = $this->createUniqueId('ad_categories', 'unique_id');

            $adCategory = new AdCategory();
            $adCategory->unique_id = $unique_id;
            $adCategory->ad_category_title = $data['category_title'];
            $adCategory->ad_desc = $data['description'];

            if ($adCategory->save()) {
                return redirect('/create-category')->with('success', 'Ad Category Was Successfully Created');
            } else {
                return redirect('/create-category')->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect('create-category')->with('error', $errorsArray);
        }

    }

    protected function Validators($request)
    {

        $this->validator = Validator::make($request->all(), [
            'category_title' => 'required',
            'description' => 'required',
        ]);
    }

    public function updateAdCategory(Request $request, $unique_id = null){
        $data = $request->all();

        try {
            $this->Validators($request); //validate fields

            if($unique_id != null){
                $adCategory = $this->adCategory->getSingleAdCategory([
                    ['unique_id', '=', $unique_id],
                ]);
                
                $adCategory->ad_category_title = $data['category_title'];
                $adCategory->ad_desc = $data['description'];

                if ($adCategory->save()) {
                    return redirect()->back()->with('success', 'Ad Category Was Successfully Updated');
                } else {
                    return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
                }
            }else{
                exit(404);
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

    public function comfirmAdsStatus(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                $now = Carbon::now()->addMonths(3);

                //update the ad status to confirmed
                $ad = $this->ad->selectSingleAd($eachDataArray);
                $ad->status = 'confirm';
                $ad->activation_date = Carbon::now()->toDateTimeString();
                $ad->duration_period = $now->toDateTimeString();
                $ad->save();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Product(s) has been confirmed successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }

    public function deleteAdsStatus(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                //update the ad status to confirmed
                $ad = $this->ad->selectSingleAd($eachDataArray);
                $ad->delete();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Product(s) has been deleted successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }


}
