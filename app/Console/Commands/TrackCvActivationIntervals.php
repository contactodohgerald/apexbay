<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Cv;  

class TrackCvActivationIntervals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CvActivationIntervals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command checks if cv`s activation is up to three (3) months. If it is, it should changed the status to pending and awaits future activation.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Cv $cv)
    {
        parent::__construct();
        $this->cv = $cv;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->checkCVActivationStatus();
    }

    public function checkCVActivationStatus(){
        $cvs = $this->cv->getAllCv([
            ['status', '=', 'confirm'],
        ]);

        if(count($cvs) > 0){
            foreach($cvs as $key => $each_cvs){
                $get_date_progress = Carbon::parse($each_cvs->activation_date)->diffInDays(Carbon::now());
                if($get_date_progress >= 91){
                    $each_cvs->status = 'pending';
                    $each_cvs->activation_date = null;
                    $each_cvs->save();
                }
            }
        }

    }
}
