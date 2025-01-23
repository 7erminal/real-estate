<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Feature;
use App\Models\Purpose;
use App\Models\Shop_detail;

class addFeaturesPageController extends Controller
{
    //
    public function addFeatures(Request $request){
    	$data['features'] = Feature::orderBy('created_at','desc')
    		->get();

    	$data['purposes'] = Purpose::orderBy('created_at','desc')
    		->get();

    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.addFeatures')->with('data',$data);
                                
    }
}
