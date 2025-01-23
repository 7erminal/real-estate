<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop_detail extends Model
{
    use HasFactory;
    //
    public function payment_details()
    {
        return $this->hasOne('App\Payment_detail','id','shopid');
    }
}
