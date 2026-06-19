<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingPackage extends Model
{
    use HasFactory;

    //orders
    public function orders(){
        return $this->hasMany(HostingPackageOrder::class,'package_id','id');
    }
}
