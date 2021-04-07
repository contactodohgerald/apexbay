<?php

namespace App\Http\Controllers\Ad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;  

class BoostAdController extends Controller
{
    //
    function __construct(Ad $ad){
        $this->ad = $ad;
    }

    public function boostAdPage(){

        $boosted_ads = $this->ad->getAllAd([
            ['status', '=', 'confirm'],
        ]);

        $view = [
            'boosted_ads'=>$boosted_ads,
        ];

        return view('front_end.boost_ads', $view);
    }
}
