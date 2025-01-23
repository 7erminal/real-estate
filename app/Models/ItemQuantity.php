<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemQuantity extends Model
{
    use HasFactory;
    //
    protected $table = "item_quantity";
    protected $fillable = ['quantity_available'];
    protected $attributes = ['frozen_quantity' => '0'];
}
