<?php

namespace App\Http\Controllers\AppSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Traits\Generics;

class AppSettingsController extends Controller
{
    //

    Use Generics;

    function __construct(AppSetting $appSetting){
        $this->appSetting = $appSetting;
    }

    public function appSettingsInterface(){
        $appSettings = $this->appSetting->getSingleAppSettings();
        return view('admin_dashboard.settings', ['appSettings'=>$appSettings]);
    }

    public function storeSettings(){

        $unique_id = $this->createUniqueId('app_settings', 'unique_id');
        $settings = new AppSetting();
        $settings->unique_id = $unique_id;

        if ($settings->save()) {
            return redirect()->back()->with('success', 'App Settings Was Successfully Created');
        } else {
            return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
        }
    }

    public function updateAppsettings(Request $request){
        $data = $request->all();

        try {

            $appSettings = $this->appSetting->getSingleAppSettings();

            if($appSettings == null){
                $this->storeSettings();
            }else{
                  //code for remove old file
                if ($appSettings->site_logo !== null) {
                    if(file_exists(storage_path('app/public/site_logo/') . $appSettings->site_logo)){
                        $file_old = storage_path('app/public/site_logo/') . $appSettings->site_logo;
                        unlink($file_old);
                    }
                }
                if ($request->hasFile('site_logo')) {
                    $file = $request->file('site_logo');
                    $site_logo = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->storeAs('public/site_logo', $site_logo);
                }

                $appSettings->site_name = $data['site_name'] ?? $appSettings->site_name;
                $appSettings->site_phone_number = $data['site_phone_number'] ?? $appSettings->site_phone_number;
                $appSettings->site_whatsapp_number = $data['site_whatsapp_number'] ?? $appSettings->site_whatsapp_number;
                $appSettings->site_telegram = $data['site_telegram'] ?? $appSettings->site_telegram;
                $appSettings->site_address = $data['site_address'] ?? $appSettings->site_address;
                $appSettings->site_mail = $data['site_mail'] ?? $appSettings->site_mail;
                $appSettings->activation_fee = $data['activation_fee'] ?? $appSettings->activation_fee;
                $appSettings->account_name = $data['account_name'] ?? $appSettings->account_name;
                $appSettings->account_number = $data['account_number'] ?? $appSettings->account_number;
                $appSettings->bank_name = $data['bank_name'] ?? $appSettings->bank_name;
                $appSettings->site_logo = $site_logo ?? $appSettings->site_logo;

            if ($appSettings->save()) {
                return redirect()->back()->with('success', 'App Settings Was Successfully Updated');
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
