<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemImage extends Model
{
    use HasFactory;
    //
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
