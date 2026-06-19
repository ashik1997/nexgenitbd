<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkSms extends Model
{
    use HasFactory;

    //orders
    public function orders(){
        return $this->hasMany(BulkSmsOrder::class,'package_id','id');
    }
}
