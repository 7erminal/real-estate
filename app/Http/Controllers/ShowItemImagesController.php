<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ItemImage;

class ShowItemImagesController extends Controller
{
    //
     public function getItemImages(Request $request){
    $data['images'] = ItemImage::where('item_id','=',$request->id)
    		->get();
    	// $data['items'] = \App\Item::all();;

    	return $data;
    }
}
