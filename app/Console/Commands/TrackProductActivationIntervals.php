<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Ad;  

class TrackProductActivationIntervals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:productActivationIntervals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command checks if product`s activation is up to six (6) months. If it is, it should changed the status to pending and awaits future activation.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Ad $ad)
    {
        parent::__construct();
        $this->ad = $ad;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $this->checkProductActivationStatus();
    }

    public function checkProductActivationStatus(){
        $ads = $this->ad->getAllAd([
            ['status', '=', 'confirm'],
        ]);

        if(count($ads) > 0){
            foreach($ads as $key => $each_ads){
                $get_date_progress = Carbon::parse($each_ads->activation_date)->diffInDays(Carbon::now());
                if($get_date_progress >= 183){
                    $each_ads->status = 'pending';
                    $each_ads->activation_date = null;
                    $each_ads->save();
                }
            }
        }

    }
}
