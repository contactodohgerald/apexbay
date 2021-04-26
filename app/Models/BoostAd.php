<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BoostAd extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function getAllBoostAd($condition, $id = 'id', $desc = 'desc'){

        return BoostAd::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleBoostAd($condition){

        return BoostAd::where($condition)->first();

    }
    
    public function getRandomSingleBoostAd($condition){

        return BoostAd::where($condition)->inRandomOrder()->limit(1)->get();

    }

    public function getBoostAdByPaginate($number, $condition = null){

        return BoostAd::where($condition)->inRandomOrder()->paginate($number);

    }

    function selectSingleBoostAd($id){
        return BoostAd::find($id);
    }

}
