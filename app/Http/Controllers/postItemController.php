<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Support\Facades\Log;

class postItemController extends Controller
{
    //
    public function insertItem(Request $request){
    	$itemname = $request->itemname;
    	$category = $request->category;
      $noOfRooms = $request->noOfRooms;
    	$quantity = $request->quantity;
    	$colors = $request->colors;
    	$price = $request->price;
    	$sizes = $request->sizes;
    	$description = $request->description;
    	$noOfBalconies = $request->noOfBalconies;
    	$noOfWashrooms = $request->noOfWashrooms;
      $currencyid = 1;

      $defaultImageId = "";
      Log::info("Save item details::");
      // Log::info($request->file('imageFiles'));
      Log::info($request->file('imageFiles[]'));
      $data=['item_name'=>$itemname,'description'=>$description,'category'=>$category,'number_of_rooms'=>$noOfRooms,'number_of_washrooms'=>$noOfWashrooms,'number_of_balconies'=>$noOfBalconies,'available_sizes'=>$sizes,'available_colors'=>$colors];

        // DB::table('items')->insert($data);
      $itemid = DB::table('items')->insertGetId($data);

      if($files=$request->file('imageFiles')){
        Log::info("Save image files::");
        Log::info($files);
        $x = 1;
        foreach($files as $uploadFile){
          Log::info("Each file::");
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

            $imageId = $this->saveImage($itemid,$modifiedFilepath,$x);

            if($x==1){
              $defaultImageId = $imageId;
            }
            $x=0;
        }
      }

      	// $upload = new Upload;
      	// $upload->filename = $filename;

      	// $upload->save();

      	Item::find($itemid)
      		->update(['item_image_id'=>$defaultImageId]);

      	$this->savePrice($itemid,$price,$currencyid);

      	$this->saveQuantity($itemid,$quantity);


    	// return view('admin/addItem')->with('data',$data);
    	return $data;
    }


    public function savePrice($itemid,$itemprice,$currencyid){
    	$data=['item_id'=>$itemid,'item_price'=>$itemprice,'currency_id'=>$currencyid];

      Log::info("Save price::");

    	DB::table('item_prices')->insert($data);
    }

    public function saveQuantity($itemid,$quantity){
    	$data=['item_id'=>$itemid,'quantity_available'=>$quantity];

    	DB::table('item_quantity')->insert($data);
    }



    /* Save image in image table. This will save the image
    in the database.
    */
    public function saveImage($itemid,$imagepath,$isDefault){
        $data=['item_id'=>$itemid,'image_path'=>$imagepath,'is_default'=>$isDefault];

        // DB::table('item_images')->insert($data);

        $imageid = DB::table('item_images')->insertGetId($data);

        return $imageid;
    } // Fin


    /* Save media in media table. This will save media
    in the database.
    */
    public function saveMedia($imagepath,$type){
        $data=['path'=>$imagepath,'media_type'=>$type];

        // DB::table('item_images')->insert($data);

        $imageid = DB::table('media')->insertGetId($data);

        return $imageid;
    } // Fin



    // Categories
    public function insertCategory(Request $request){
      $categoryName = $request->categoryname;
      $modifiedFilepath="";

      Log::debug("Request received");
      Log::debug($request);

      if($request->hasFile('imageFile')){

      $uploadFile = $request->file('imageFile');
      $filename = time().$uploadFile->getClientOriginalName();
      $modifiedFilepath = 'category-images/'.$filename;
      $currencyid = 1;

      Storage::disk('local')->putFileAs(
          'public/category-images',
          $uploadFile,
          $filename
        );
      }

      Log::debug("Saving...");
      Log::debug($categoryName." -- ".$modifiedFilepath);

      $data = ['category_name'=>$categoryName,'image_path'=>$modifiedFilepath];

      $categoryid = DB::table('categories')->insertGetId($data);

      return $categoryid;

    }

    // Edit Sub Category
    public function editCategory(Request $request){
      $cat = $request->categoryId;
      $newDesc = $request->newDescription;
      $modifiedFilepath="";
      
      Log::debug("Editing Category...");
      Log::debug($cat);

      $hasFile = false;

      $category = DB::table('categories')->where('id',$cat);

      $catCheck = $category->first();

      if($request->hasFile('imageFile')){

        $uploadFile = $request->file('imageFile');
        $filename = time().$uploadFile->getClientOriginalName();
        $modifiedFilepath = 'category-images/'.$filename;
        $currencyid = 1;
  
        Storage::disk('local')->putFileAs(
            'public/category-images',
            $uploadFile,
            $filename
          );

        $hasFile = true;
      }
 

      $response = "FAILED";

      try{

        if($catCheck->category_type=="ROOT"){
          $data = ['image_path'=>$modifiedFilepath];
        } else {
          if($hasFile==true){
            $data = ['category_name'=>$newDesc, 'image_path'=>$modifiedFilepath];
          } else {
            $data = ['category_name'=>$newDesc];
          }
        }
        

        $category->update($data);

        $response = "SUCCESS";
      } catch(Exception $e){
        Log::info("An error occurred");
        Log::error($e);
        $response = "FAILED";
      }
      

      return $response;
    }

    // Delete Sub Category
    public function deleteCategory(Request $request){
      $cat = $request->id;
      
      Log::debug("Deleting...");
      Log::debug($cat);
 

      $response = "FAILED";

      try{
        $category = DB::table('categories')->where('id',$cat);

        Log::debug("cat is ");
        // Log::debug($subCategory);

        $catCheck = $category->first();

        if($catCheck->category_type=="ROOT"){
          $response = "DENIED";
        } else {
          $category->delete();

          $response = "SUCCESS";
        }
      } catch(Exception $e){
        Log::info("An error occurred");
        Log::error($e);
        $response = "FAILED";
      }
      
      return $response;
    }

    // Categories
    public function insertSubCategories(Request $request){
      $category = $request->categoryid;
      $subCategories = $request->subCategories;
      
      Log::debug("Saving...");
      Log::debug($category." -- ");
      Log::debug($subCategories);

      $response = "FAILED";

      try{
        foreach($subCategories as $cat){
          $data = ['category_id'=>$category,'sub_category'=>$cat];
  
          $subcategoryid = DB::table('sub_categories')->insertGetId($data);
        }

        $response = "SUCCESS";
      } catch(Exception $e){
        Log::info("An error occurred");
        Log::error($e);
        $response = "FAILED";
      }
      

      return $response;
    }

    // Edit Sub Category
    public function editSubCategory(Request $request){
      $subCat = $request->subCategoryId;
      $newDesc = $request->newDescription;
      
      Log::debug("Editing...");
      Log::debug($subCat);
 

      $response = "FAILED";

      try{
        $subCategory = DB::table('sub_categories')->where('id',$subCat);

        $data = ['sub_category'=>$newDesc];

        $subCategory->update($data);

        $response = "SUCCESS";
      } catch(Exception $e){
        Log::info("An error occurred");
        Log::error($e);
        $response = "FAILED";
      }
      

      return $response;
    }

    // Delete Sub Category
    public function deleteSubCategory(Request $request){
      $subCat = $request->id;
      
      Log::debug("Deleting...");
      Log::debug($subCat);
 

      $response = "FAILED";

      try{
        $subCategory = DB::table('sub_categories')->where('id',$subCat);

        Log::debug("Sub cat is ");
        // Log::debug($subCategory);

        $subCategory->delete();

        $response = "SUCCESS";
      } catch(Exception $e){
        Log::info("An error occurred");
        Log::error($e);
        $response = "FAILED";
      }
      

      return $response;
    }

    // Features
    public function insertFeature(Request $request){
      $featureName = $request->featurename;
      $modifiedFilepath="";

      if($request->hasFile('imageFile')){
      $uploadFile = $request->file('imageFile');
      $filename = time().$uploadFile->getClientOriginalName();
      $modifiedFilepath = 'feature-images/'.$filename;
      $currencyid = 1;

      Storage::disk('local')->putFileAs(
          'public/feature-images',
          $uploadFile,
          $filename
        );
      }
      
      $data = ['feature'=>$featureName,'image_path'=>$modifiedFilepath];

      $featureid = DB::table('features')->insertGetId($data);

      return redirect('admin2/addFeatures');

    }

    // Purposes
    public function insertPurpose(Request $request){
      $purposeName = $request->purposename;
      $modifiedFilepath="";

      if($request->hasFile('imageFile')){
      $uploadFile = $request->file('imageFile');
      $filename = time().$uploadFile->getClientOriginalName();
      $modifiedFilepath = 'purpose-images/'.$filename;
      $currencyid = 1;

      Storage::disk('local')->putFileAs(
          'public/purpose-images',
          $uploadFile,
          $filename
        );
      }

      $data = ['purpose'=>$purposeName,'image_path'=>$modifiedFilepath];

      $purposeid = DB::table('purposes')->insertGetId($data);

      return redirect('admin2/addFeatures');

    }

    public function addImages(Request $request){

      if($files=$request->file('imageFiles')){
        $x = $request->mediatype;
        foreach($files as $uploadFile){
            $filename  = time().$uploadFile->getClientOriginalName();
            $extension = $uploadFile->getClientOriginalExtension();
            $modifiedFilepath = 'media-images/'.$filename;
            // $picture   = date('His').'-'.$filename;
      
      //Save files in below folder path, that will make in public folder
            // $file->move(public_path('item-images'), $picture);
            Storage::disk('local')->putFileAs(
                'public/media-images',
                $uploadFile,
                $filename
            );

            $imageId = $this->saveMedia($modifiedFilepath,$x);
        }
      }

      return redirect('admin2/addImagesPage');
    }
}
