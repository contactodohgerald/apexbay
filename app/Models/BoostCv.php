<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BoostCv extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function getAllBoostCv($condition, $id = 'id', $desc = 'desc'){

        return BoostCv::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleBoostCv($condition){

        return BoostCv::where($condition)->first();

    }
    
    public function getRandomSingleBoostCv($condition){

        return BoostCv::where($condition)->inRandomOrder()->limit(1)->get();

    }

    public function getBoostCvByPaginate($number, $condition = null){

        return BoostCv::where($condition)->inRandomOrder()->paginate($number);

    }

    function selectSingleBoostCv($id){
        return BoostCv::find($id);
    }
}
