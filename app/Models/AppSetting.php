<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getSingleAppSettings(){

        $condition = [
            ['unique_id', '=', 'euE6XOmR3bCBmSdd7e214f4a6c839a6'],
        ];

        return AppSetting::where($condition)->first();

    }
}
