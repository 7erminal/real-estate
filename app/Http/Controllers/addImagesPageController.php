<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Shop_detail;

class addImagesPageController extends Controller
{
    //
    public function addImagesPage(){
    	$data['media'] = Media::orderBy('created_at','desc')
    		->get();

    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.addImages')->with('data',$data);
    }
}
