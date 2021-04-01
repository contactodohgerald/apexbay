<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Illuminate\Support\Facades\Validator;
use App\Traits\Generics;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Exception; 
use App\Models\PaystackPayment;  

class PaymentController extends Controller
{
    //
    Use Generics;

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return redirect()->back()->with('error', 'The paystack token has expired. Please refresh the page and try again.');
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $payment_status = Paystack::getPaymentData();

        //dd($payment_status); return;
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want

        try{

            if ($payment_status['data']['status'] === 'success'){

                $unique_id =  $this->createUniqueId('paystack_payments', 'unique_id');

                $amont = $payment_status['data']['amount'] / 100;

                $transaction = new PaystackPayment();
                $transaction->unique_id = $unique_id;
                $transaction->user_unique_id =  Auth::user()->unique_id;
                $transaction->amount = $amont;
                $transaction->currency = $payment_status['data']['currency']; 
                $transaction->ip_address = $payment_status['data']['ip_address'];
                $transaction->reference = $payment_status['data']['reference'];
                $transaction->customer_code = $payment_status['data']['customer']['customer_code'];
                $transaction->channel = $payment_status['data']['channel'];
                $transaction->payment_type = $payment_status['data']['metadata']['payment_type'];
                $transaction->status = 'confirmed';

                if ($transaction->save()) {
                    return redirect()->back()->with('success', 'Your Transaction was successfull');
                } else {
                    return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
                }

            }

        }catch (Exception $exception){

            $errors = $exception->getMessage();
            return  redirect()->back()->with('error_status', $errors);

        }
    }
    
}
