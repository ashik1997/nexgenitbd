<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingPackageOrder extends Model
{
    use HasFactory;

    //package
    public function package(){
        return $this->belongsTo(HostingPackage::class,'package_id','id');
    }
}
