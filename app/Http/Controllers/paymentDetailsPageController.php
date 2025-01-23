<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_detail;
use App\Models\Shop_detail;

class paymentDetailsPageController extends Controller
{
    //
    public function showDetails(){
    	$data = Payment_detail::first();

    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.paymentDetails')->with('data',$data);
    }
}
