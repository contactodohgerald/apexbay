<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function cv_comment(){
        return $this->hasMany('App\Models\CvComment', 'cv_unique_id');
    }
    
    public function getAllCv($condition, $id = 'id', $desc = 'desc'){

        return Cv::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleCv($condition){

        return Cv::where($condition)->first();

    }

    public function getCvByPaginate($number, $condition = null, $id = 'id', $desc = 'desc'){

        return Cv::where($condition)->orderBy($id, $desc)->simplePaginate($number);

    }

    function selectSingleCv($id){
        return Cv::find($id);
    }

}
