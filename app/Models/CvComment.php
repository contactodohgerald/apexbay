<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CvComment extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function getAllCvComments($condition, $id = 'id', $desc = 'desc'){

        return CvComment::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleCvComments($condition){

        return CvComment::where($condition)->first();

    }
}
