<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDesignPackageOrder extends Model
{
    use HasFactory;

     //package
     public function package(){
        return $this->belongsTo(WebDesignPackage::class,'package_id','id');
    }
}
