<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Shop_detail;
use Illuminate\Support\Facades\Log;

class addCategoryPageController extends Controller
{
    //
    public function addCategory(Request $request){
    	$data['shopdetails'] = Shop_detail::first();


    	return view('admin.addCategory')->with('data',$data);
                                
    }

	public function getCategories(Request $request){
    	// $data['categories'] = Category::with(['sub_categories'=>function($query){
		// 	$query->select('category_id', 'sub_category');
		// }])->orderBy('categories.created_at','desc')
    	// 	->get();

		$data['categories'] = Category::with('subCategories')->orderBy('categories.created_at','desc')
    		->get();

		// Log::info("Data returned is ");
		// Log::info($data);


    	return $data;
                                
    }
}
