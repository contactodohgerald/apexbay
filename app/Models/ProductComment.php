<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_unique_id');
    }

    public function getAllComments($condition, $id = 'id', $desc = 'desc'){

        return ProductComment::orderBy($id, $desc)->where($condition)->get();

    }

    public function getSingleComments($condition){

        return ProductComment::where($condition)->first();

    }
}
