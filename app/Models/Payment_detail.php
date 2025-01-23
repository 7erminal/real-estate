<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment_detail extends Model
{
    use HasFactory;
    //
    protected $fillable = ['shopid','collection_account'];
}
