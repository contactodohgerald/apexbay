<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Ad;  
use App\Models\Cv; 
use App\Models\PaystackPayment; 
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    //
    function __construct(AppSetting $appSetting, Ad $ad, Cv $cv, PaystackPayment $paystackPayment){
        $this->middleware('auth', ['except' => ['deleteTransaction', 'premuimSubscribe']]);
        $this->appSetting = $appSetting;
        $this->ad = $ad;
        $this->cv = $cv;
        $this->paystackPayment = $paystackPayment;
    }

    public function premuimSubscribe(){
        $appSettings = $this->appSetting->getSingleAppSettings();
        $view = [
            'appSettings'=>$appSettings,
        ];
        return view('front_end.pricing', $view);
    }

    public function checkOutPage($unique_id = null){

        if($unique_id != null){
            $ad = $this->ad->getSingleAd([
                ['unique_id', '=', $unique_id]
            ]);
            $appSettings = $this->appSetting->getSingleAppSettings();
  
            $view = [
                'appSettings'=>$appSettings,
                'ad'=>$ad,
            ];
            return view('front_end.check_out', $view);
        }else{
            return view('front_end.check_out');
        }
    }

    public function cvCheckOutPage($unique_id = null){

        if($unique_id != null){
            $cv = $this->cv->getSingleCv([
                ['unique_id', '=', $unique_id]
            ]);
            $appSettings = $this->appSetting->getSingleAppSettings();
  
            $view = [
                'appSettings'=>$appSettings,
                'cv'=>$cv,
            ];
            return view('front_end.cv_check_out', $view);
        }else{
            return view('front_end.cv_check_out');
        }
    }

    public function transactionPage(){
        $transactions = $this->paystackPayment->getAllPaystackPayment([
            ['status', 'confirmed'],
            ['payment_type', 'Product Activation'],
        ]);
        foreach($transactions as $each_transactions){
            $each_transactions->users;
        }
        $view = [
            'transactions'=>$transactions,
        ];
        return view('admin_dashboard.transactions', $view);
    }

    public function cvTransactionPage(){
        $transactions = $this->paystackPayment->getAllPaystackPayment([
            ['status', 'confirmed'],
            ['payment_type', 'Cv Activation'],
        ]);
        foreach($transactions as $each_transactions){
            $each_transactions->users;
        }
        $view = [
            'transactions'=>$transactions,
        ];
        return view('admin_dashboard.cv_transactions', $view);
    }

    function handleValidations(array $data)
    {

        $validator = Validator::make($data, [
            'dataArray' => 'required|string'
        ]);

        return $validator;
    }

    public function deleteTransaction(Request $request){
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {
                //update the ad status to confirmed
                $transaction = $this->paystackPayment->selectSinglePaystackPayment($eachDataArray);
                $transaction->delete();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Was deleted successfully']);
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }

    

    

    
}
