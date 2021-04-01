<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AdCategory extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getAllAdCategory($condition, $id = 'id', $desc = 'desc'){

        return AdCategory::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleAdCategory($condition){

        return AdCategory::where($condition)->first();

    }
}
