<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop_detail;
use App\Models\Purpose;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Cart;
use DB;

class myaccountController extends Controller
{
    //
    public function myaccount(Request $request){
    	
    	// $count = User::find(Auth::id());
        $sessionkey = $request->session()->get('_token', 'default');
    	$data['shopdetails'] = Shop_detail::first();
    	$data['cart'] = [];
    	$data['cartCount'] = 0;

    	if (Auth::check()) {
    	// The user is logged in...

    		$userid = Auth::user()->id;

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

    	$data['transactions'] = Transaction::where('transactions.user_id','=',$userid)
    		->get();

    	$data['stats'] = Transaction::select(DB::raw('SUM(total_price) as totalprice, COUNT(id) as numberoftransactions, SUM(quantity) as totalquantity'))
    					->where('user_id','=',$userid)
    					->get();

    		return view('myaccount')->with('data',$data);
    					// return $data;
		}

    	return view('auth.login')->with('data',$data);    	

    }
    


}
