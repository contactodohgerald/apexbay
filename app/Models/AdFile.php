<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AdFile extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getAllAd($condition, $id = 'id', $desc = 'desc'){

        return Ad::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleAd($condition){

        return Ad::where($condition)->first();

    }
}
