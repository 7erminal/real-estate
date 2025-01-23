<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\Category;
use App\Models\Purpose;
use App\Models\Feature;
use DB;

class removeItemsController extends Controller
{
    //
    public function removeitems(Request $request){
    	$itemid = explode(',',$request->itemid);
        $type = $request->itemtype;


        if($type=="items"){
    	   foreach ($itemid as $id => $iteml) {
    		# code...
            
            $item = Item::find($iteml);    
            
    		$item->delete();
    	   }

           return redirect('admin2/addItem');
        }

        if($type=="categories"){
           foreach ($itemid as $id => $iteml) {
            # code...
            
                $item = Category::find($iteml);    
            
                $item->delete();
           }

           return redirect('admin2/addCategory');
        }

        if($type=="features"){
           foreach ($itemid as $id => $iteml) {
            # code...
            
                $item = Feature::find($iteml);    
            
                $item->delete();
           }

           return redirect('admin2/addFeatures');
        }

        if($type=="purposes"){
           foreach ($itemid as $id => $iteml) {
            # code...
            
                $item = Purpose::find($iteml);    
            
                $item->delete();
           }

           return redirect('admin2/addFeatures');
        }

    	// return view('admin/addItem')->with('data',$data);
    	
    }

    public function removeImage(Request $request){
        $imageId = $request->imageid;

        $itemImage = ItemImage::find($imageId);

        $itemImage->delete();

        $data = $imageId;
        return $data;
    }
}
