<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function ad_files_get(){
        return $this->hasMany('App\Models\AdFile', 'ad_unique_id');
    }

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function product_comment(){
        return $this->hasMany('App\Models\ProductComment', 'product_unique_id');
    }

    
    public function getAllAd($condition, $id = 'id', $desc = 'desc'){

        return Ad::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleAd($condition){

        return Ad::where($condition)->first();

    }

    public function getAdByPaginate($number, $condition = null, $id = 'id', $desc = 'desc'){

        return Ad::where($condition)->orderBy($id, $desc)->simplePaginate($number);

    }

    function selectSingleAd($id){
        return Ad::find($id);
    }
}
