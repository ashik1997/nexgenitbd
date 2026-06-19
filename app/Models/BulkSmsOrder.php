<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkSmsOrder extends Model
{
    use HasFactory;

    //package
    public function package(){
        return $this->belongsTo(BulkSms::class,'package_id','id');
    }
}
