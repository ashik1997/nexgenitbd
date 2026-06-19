<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpnPackage extends Model
{
    use HasFactory;

    //orders
    public function orders(){
        return $this->hasMany(VpnPackageOrder::class,'package_id','id');
    }
}
