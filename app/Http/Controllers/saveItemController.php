<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\ItemPrice;
use App\Models\ItemImage;
use Illuminate\Support\Facades\Log;
use DB;

class saveItemController extends Controller
{
    //
    public function saveItem(Request $request){
    	$itemid = $request->itemid;
    	$itemname = $request->itemname;
    	$category = $request->category;
        $noOfRooms = $request->noOfRooms;
    	$quantity = $request->quantity;
    	// $colors = $request->colors;
    	$price = $request->price;
    	$sizes = $request->sizes;
    	$noOfWashrooms = $request->noOfWashrooms;
        $currency = $request->currency;

        Log::info("House ID received is ".$noOfRooms);
        Log::info("House ID received is ".$noOfWashrooms);
        Log::info("House ID received is ".$itemid);

    	$data=['item_name'=>$itemname,'category'=>$category, 'number_of_rooms'=>$noOfRooms, 'number_of_washrooms'=>$noOfWashrooms,'available_sizes'=>$sizes];


    	$data = Item::where('id','=',$itemid)
      		->update($data);

        $data2=['quantity_available'=>$quantity];

        $data2 = ItemQuantity::where('item_id','=',$itemid)
            ->update($data2);

        $data3=['item_price'=>$price,'currency_id'=>$currency];

        $data3 = ItemPrice::where('item_id','=',$itemid)
            ->update($data3);

    	return redirect('admin2/addItem');
      	// $data = $this->getItems();

      	// return view('admin/addItem')->with('data',$data);
    	// echo "Item ID is ".$itemid." and size is ".$sizes." and the whole item is ".$data;
    }

    public function saveMore(Request $request){
        $purpose = $request->purpose;
        $description = $request->description;
        $itemid = $request->itemid;

        $data=['suitable_purposes'=>$purpose,'description'=>$description];

        $data = Item::find($itemid)
            ->update($data);

        return redirect('admin2/addItem');
    }


    // This is the function to save multiple images. Important function to add to library.
    public function saveMoreImages(Request $request){
        $itemid = $request->itemid;
        $imagestoremove = explode(',', $request->imagestoremove);
        $isdefault = $request->isdefault;

        //Check Files Count
         if($request->TotalImages > 0)
         {
        //Loop for getting files with index like image0, image1
            for ($x = 0; $x < $request->TotalImages; $x++) {
       
            if ($request->hasFile('images'.$x)) {
            
            $uploadFile      = $request->file('images'.$x);
            $filename  = time().$uploadFile->getClientOriginalName();
            $extension = $uploadFile->getClientOriginalExtension();
            $modifiedFilepath = 'item-images/'.$filename;
            // $picture   = date('His').'-'.$filename;
      
      //Save files in below folder path, that will make in public folder
            // $file->move(public_path('item-images'), $picture);
            Storage::disk('local')->putFileAs(
                'public/item-images',
                $uploadFile,
                $filename
            );

            $this->saveImage($itemid,$modifiedFilepath);
            
             }
            
         }
         $status = "successful upload!";
    }
    else
    {
          // return response()->json(["message" => "failed"]);
    }

    // Check if there are images to delete
    // return response()->json(["message" => $imagestoremove]);

    if(empty($imagestoremove)){
        // return response()->json(["message" => "Empty!"]);
    }
        else{

        // return response()->json(["message" => $imagestoremove[0]]);
        
        foreach ($imagestoremove as $i => $imageid) {
            // return response()->json(["message" => $i." and ".$imageid]);
              
                    # code...
                    $this->removeImage($imageid);
        
        }
        $status = "successful!";
    } //

    //Update default Image in items table
    $item = ItemImage::where('item_id','=',$itemid)
        ->update(['is_default'=>0]);
        
    $defaultUpdate = ItemImage::where([
        ['item_id','=',$itemid],
        ['id','=',$isdefault]
    ])
        ->update(['is_default'=>1]);

    $defaultUpdateItems = Item::where('id','=',$itemid)
        ->update(['item_image_id'=>$isdefault]);


    return response()->json(["message" => $status]);

    } // Fin

    /* Save image in image table. This will save the image
    in the database.
    */
    public function saveImage($itemid,$imagepath){
        $data=['item_id'=>$itemid,'image_path'=>$imagepath,'is_default'=>0];

        // DB::table('item_images')->insert($data);

        $imageid = DB::table('item_images')->insertGetId($data);

        return $imageid;
    } // Fin

    /* This is the function that will actually 
    remove the image from the DB. 
    This will be upgraded to remove the image from 
    storage as well so as to free up space.
    */
    public function removeImage($imageid){

        if($imageid != NULL){
            $itemImage = ItemImage::find($imageid);

            $itemImage->delete();
        }
        

        // $data = $imageid;
        // return $data;
    } // Fin

}
