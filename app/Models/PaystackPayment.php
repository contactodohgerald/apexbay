<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PaystackPayment extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function getAllPaystackPayment($condition, $id = 'id', $desc = 'desc'){

        return PaystackPayment::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSinglePaystackPayment($condition){

        return PaystackPayment::where($condition)->first();

    }

    function selectSinglePaystackPayment($id){
        return PaystackPayment::find($id);
    }
    
}
