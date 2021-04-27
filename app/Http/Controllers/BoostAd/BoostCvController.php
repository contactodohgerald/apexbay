<?php

namespace App\Http\Controllers\BoostAd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;  
use App\Models\BoostCv;
use App\Traits\Generics;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BoostCvController extends Controller
{
    //
    Use Generics;

    function __construct(Ad $ad, BoostCv $BoostCv){
        $this->middleware('auth', ['except' => ['deleteBoostCvs', 'updeteBoostCvsStatus', 'boostCvPage']]);
        $this->ad = $ad;
        $this->BoostCv = $BoostCv;
    }

    public function boostCvPage(Request $request){

        $boosted_cvs = $this->BoostCv->getBoostCvByPaginate(5,[
            ['status', '=', 'on'],
        ]);

        foreach($boosted_cvs as $each_boost_cv){

            $each_boost_cv->users;

        }

        $view = [
            'boosted_cvs'=>$boosted_cvs,
        ];

        if($request->ajax()){
            $views = view('front_end.boost_cvs_data', compact('boosted_cvs'))->render();
            return response()->json(['html'=>$views]);
        }   

        return view('front_end.boost_cvs', $view);
    }

    public function createBoostCvInterface(){

        return view('admin_dashboard.add_boosted_cvs');

    }

    protected function Validator($request)
    {

        $this->validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
    }

    public function addBoostedCvs(Request $request){
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
                $file->storeAs('public/boost_cvs', $add_banner);
            }

            $unique_id = $this->createUniqueId('boost_cvs', 'unique_id');

            $boostCvs = new BoostCv();
          
            $boostCvs->unique_id = $unique_id;
            $boostCvs->user_unique_id = $user->unique_id;
            $boostCvs->phone_number = $data['phone'];
            $boostCvs->boost_cv_image = $add_banner;
            $boostCvs->description = $data['description'];

            if ($boostCvs->save()) {
                return redirect()->back()->with('success', 'Boosted Cv Was Successfully Created');
            } else {
                return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()->with('error', $errorsArray);
        }
    }

    public function getAllBoostedCvs(){
        $query = [
            ['deleted_at', null]
        ];
        $boostCv = $this->BoostCv->getAllBoostCv($query);

        foreach($boostCv as $each_boost_cv){

            $each_boost_cv->users;

        }

        $view = [
            'boostCv'=>$boostCv,
        ];


        return view('admin_dashboard.all_boosted_cvs', $view);
    }

    function handleValidations(array $data)
    {

        $validator = Validator::make($data, [
            'dataArray' => 'required|string'
        ]);

        return $validator;
    }

    public function deleteBoostCvs(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                //get the a single cv to delete
                $BoostCv = $this->BoostCv->selectSingleBoostCv($eachDataArray);
                $BoostCv->delete();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Cv has been deleted successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }

    public function updeteBoostCvsStatus(Request $request)
    {
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {

                //update the boost ad status
                $BoostCv = $this->BoostCv->selectSingleBoostCv($eachDataArray);
                $BoostCv->status = $request->action;
                $BoostCv->save();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Selected Cv(s) was updated successfully']);
        } catch (Exception $exception) {

            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }
}
