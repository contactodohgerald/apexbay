<?php

namespace App\Http\Controllers\BoostAd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;  
use App\Models\BoostAd;
use App\Traits\Generics;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BoostAdController extends Controller
{
    //
    Use Generics;

    function __construct(Ad $ad, BoostAd $BoostAd){
        $this->middleware('auth', ['except' => ['deleteBoostAds', 'updeteBoostAdsStatus', 'boostAdPage']]);
        $this->ad = $ad;
        $this->BoostAd = $BoostAd;
    }

    public function boostAdPage(Request $request){

        $boosted_ads = $this->BoostAd->getBoostAdByPaginate(5,[
            ['status', '=', 'on'],
        ]);

        foreach($boosted_ads as $each_boost_ad){

            $each_boost_ad->users;

        }

        if($request->ajax()){
            $boost_views = view('front_end.boost_ads_data', compact('boosted_ads'))->render();
            return response()->json(['html'=>$boost_views]);
        }   

        $view = [
            'boosted_ads'=>$boosted_ads,
        ];

        return view('front_end.boost_ads', $view);
    }

    public function createBoostAdInterface(){

        return view('admin_dashboard.add_boosted_ads');

    }

    protected function Validator($request)
    {

        $this->validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
    }

    public function addBoostedAds(Request $request){
        $data = $request->all();
        $user = Auth::user();

        try {
            $this->Validator($request); //validate fields

            if ($request->hasFile('add_banner')) {
                $request->validate([
                    'add_banner' => 'required',
                ]);

                $file = $request->file('add_banner');
                $add_banner = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->storeAs('public/boost_add', $add_banner);
            }

            $unique_id = $this->createUniqueId('boost_ads', 'unique_id');

            $boostAdds = new BoostAd();
          
            $boostAdds->unique_id = $unique_id;
            $boostAdds->user_unique_id = $user->unique_id;
            $boostAdds->phone_number = $data['phone'];
            $boostAdds->add_image = $add_banner;
            $boostAdds->description = $data['description'];

            if ($boostAdds->save()) {
                return redirect()->back()->with('success', 'Boosted Ad Was Successfully Created');
            } else {
                return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()->with('error', $errorsArray);
        }
    } 

    public function getAllBoostedAds(){
        $query = [
            ['deleted_at', null]
        ];
        $boostAd = $this->BoostAd->getAllBoostAd($query);

        foreach($boostAd as $each_boost_ad){

            $each_boost_ad->users;

        }

        $view = [
            'boostAd'=>$boostAd,
        ];


        return view('admin_dashboard.all_boosted_ad', $view);
    }

    function handleValidations(array $data)
    {

        $validator = Validator::make($data, [
            'dataArray' => 'required|string'
        ]);

        return $validator;
    }


    public function deleteBoostAds(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                //get the a single ad to delete
                $BoostAd = $this->BoostAd->selectSingleBoostAd($eachDataArray);
                $BoostAd->delete();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Ad has been deleted successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }

    public function updeteBoostAdsStatus(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                //update the boost ad status
                $BoostAd = $this->BoostAd->selectSingleBoostAd($eachDataArray);
                $BoostAd->status = $request->action;
                $BoostAd->save();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Ad(s) was updated successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }

}
