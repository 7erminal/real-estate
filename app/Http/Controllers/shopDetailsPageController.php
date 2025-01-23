<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_detail;
use App\Models\Item;

class shopDetailsPageController extends Controller
{
    //
    public function showDetails(){
    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.shopDetails')->with('data',$data);
    }

}
