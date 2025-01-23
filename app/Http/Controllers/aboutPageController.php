<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_detail;
use App\Models\Cart;

class aboutPageController extends Controller
{
    //
    public function showDetails(){
    	// $data['shop'] = Shop_detail::first();

    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.about')->with('data',$data);
    }

    public function showLegalDetails(Request $request){
    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.legal')->with('data',$data);
    }

    public function showAbout(Request $request){
    	// $data['shop'] = Shop_detail::first();

    	$sessionkey = $request->session()->get('_token', 'default');
        $data['cart'] = [];
        $data['cartCount'] = 0;

        if(Cart::where('sessionid',$sessionkey)->exists()){
            $cartItems = Cart::where('sessionid',$sessionkey)->first();
            $data['cart'] = json_decode($cartItems->payload);

            if($cartItems->payload!=NULL){
                $data['cartCount'] = count(json_decode($cartItems->payload));
            } else {$data['cartCount'] = 0;}

        } else {
            $cartData = ['sessionid'=>$sessionkey];

            DB::table('carts')->insert($cartData);
        }

    	$data['shopdetails'] = Shop_detail::first();


    		return view('about')->with('data',$data);
    	

    	// if($viewType=="termsandconditions"){
    	// 	return view('termsandconditions')->with('data',$data);
    	// }

    	// if($viewType=="privacypolicy"){
    	// 	return view('privacypolicy')->with('data',$data);
    	// }
    	
    }
}
