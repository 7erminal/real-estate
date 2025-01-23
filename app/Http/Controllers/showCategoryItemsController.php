<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Shop_detail;
use App\Models\Cart;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Purpose;
use DB;
use Illuminate\Support\Facades\Log;

class showCategoryItemsController extends Controller
{
    //
    public function categoryid(Request $request){

        $sessionkey = $request->session()->get('_token', 'default');

    	$data['cart'] = [];
        $data['cartCount'] = 0;
        $data['categories']= Category::with('subCategories')->get();

        if(Cart::where('sessionid',$sessionkey)->exists()){
            $cartItems = Cart::where('sessionid',$sessionkey)->first();

            if(trim($cartItems->payload)!=NULL){
                $data['cart'] = json_decode($cartItems->payload);
                $data['cartCount'] = count(json_decode($cartItems->payload));
            } else {$data['cartCount'] = 0;}

        } else {
            $cartData = ['sessionid'=>$sessionkey];

            DB::table('carts')->insert($cartData);
        }

    	$data['shopdetails'] = Shop_detail::first();

    	$data['categoryid'] = $request->categoryid;
        $data['type'] = $request->type;
        $data['subCatType'] = $request->subtype;

    	return view('items')->with('data',$data);
    }

    public function showItems (Request $request){
    	$categoryid = $request->id;
        $type = trim($request->type);
        $subCategoryid = $request->subId;
        // $data['items'] = "";
        Log::info("Category ID is ".$categoryid." with the type being ".$type." and sub category id is ".$subCategoryid);

        if($categoryid=="all"){
            $data['categoryid'] = $categoryid;
        } else {
            $data['categoryid'] = Category::with('subCategories')->find($categoryid);
        }

        if($type == "category"){
            $data['categories'] = Category::with('subCategories')->get();

            if($subCategoryid != 0){
                $data['items'] = Category::join('items','items.category','=','categories.category_name')
                ->join('item_prices','item_prices.item_id','=','items.id')
                ->join('item_images','items.item_image_id','=','item_images.id')
                ->join('item_quantity','items.id','=','item_quantity.item_id')
                ->join('sub_categories','items.id','=','item_quantity.item_id')
                ->select('*','items.id as iid','item_images.image_path as item_image_path', 'categories.id as categoryid')
                ->get();
            } else {
                Log::info("Type is not a sub-category. Type is a category.");
                $data['items'] = Item::leftJoin('categories','items.category','=','categories.category_name')
                ->join('item_prices','item_prices.item_id','=','items.id')
                ->join('item_images','items.item_image_id','=','item_images.id')
                ->join('item_quantity','items.id','=','item_quantity.item_id')
                ->select('*','items.id as iid','item_images.image_path as item_image_path', 'categories.id as categoryid')
                ->get();

                Log::info("Data is ");
                Log::info($data['items']);
            }
        }


        if($type == "feature"){
            $data['categories'] = Feature::select('*','feature as category_name')
                                    ->get();

            $data['items'] = Feature::join('items','items.feature','=','features.feature')
                ->join('item_prices','item_prices.item_id','=','items.id')
                ->join('item_images','items.item_image_id','=','item_images.id')
                ->join('item_quantity','items.id','=','item_quantity.item_id')
                ->select('*','items.id as iid','item_images.image_path as item_image_path', 'features.id as categoryid')
                ->get();
        }

        if($type == "purpose"){
            $data['categories'] = Purpose::select('*','purpose as category_name')
                                    ->get();

            $data['items'] = Purpose::join('items','items.suitable_purposes','=','purposes.purpose')
                ->join('item_prices','item_prices.item_id','=','items.id')
                ->join('item_images','items.item_image_id','=','item_images.id')
                ->join('item_quantity','items.id','=','item_quantity.item_id')
                ->select('*','items.id as iid','item_images.image_path as item_image_path', 'purposes.id as categoryid')
                ->get();
        }
    	

    	$data['shopdetails'] = Shop_detail::first();
    	
    	// return view('items')->with('data',$data);
    	return $data;
    }
}
