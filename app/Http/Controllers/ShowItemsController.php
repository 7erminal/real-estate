<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use DB;

class ShowItemsController extends Controller
{
    //
    public function getItems(Request $request){
    	// $data['items'] = Item::find(1)->item_images
    	// 	->get();
    	$data['items'] = Item::join('item_images','items.id','=','item_images.item_id')
    		->join('item_prices','item_prices.item_id','=','items.id')
    		->where('item_images.is_default','=','1')
            ->select('*','items.id as iid')
    		->get();
    	// $data['items'] = \App\Item::all();;

    	return $data;
    }
}
