<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpnPackageOrder extends Model
{
    use HasFactory;

    //package
    public function package(){
        return $this->belongsTo(VpnPackage::class,'package_id','id');
    }
}
