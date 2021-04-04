<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CvCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getAllCvCategory($condition, $id = 'id', $desc = 'desc'){

        return CvCategory::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleCvCategory($condition){

        return CvCategory::where($condition)->first();

    }
}
