<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDesignPackage extends Model
{
    use HasFactory;

    //orders
    public function orders(){
        return $this->hasMany(WebDesignPackageOrder::class,'package_id','id');
    }
}
