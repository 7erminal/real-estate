<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop_detail;
use App\Models\Cart;
use App\Models\Category;
use DB;

class cartController extends Controller
{
    //
    public function cart(Request $request){
        if($request->cartItems){
            $data['cart'] = json_decode($request->cartItems);
            $data['cartCount'] = count(json_decode($request->cartItems));
        } else {
            $sessionkey = $request->session()->get('_token', 'default');
            $cartItems = Cart::where('sessionid',$sessionkey)->first();
            $data['cart'] = json_decode($cartItems->payload);
            $data['cartCount'] = count(json_decode($cartItems->payload));
        }
    	

    	$data['shopdetails'] = Shop_detail::first();
        $data['categories']= Category::with('subCategories')->get();

    	$data['price'] = 0;

    	foreach ($data['cart'] as $i => $cart) {
    		# code...
    		$data['price'] = $data['price'] + ($cart[0]->item_price * $cart[1]->quantity);
    	}


    	 return view('cart')->with('data',$data);

    	// echo json_encode($data);
    	 
    }

    public function updateCart(Request $request){
        $data['cart'] = $request->cart;
        $sessionkey = $request->sessionid;

        if(Cart::where('sessionid',$sessionkey)->exists()){
            $cartData = ['payload'=>$data['cart']];

            Cart::where('sessionid','=',$sessionkey)->update($cartData);

        } else {
            $cartData = ['sessionid'=>$sessionkey];

            DB::table('carts')->insert($cartData);

            $cartData = ['payload'=>$data['cart']];

            Cart::where('sessionid','=',$sessionkey)->update($cartData);
        }

        return $data;
    }

    public function removeItem(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');
        $itemid = $request->itemid;
        $data['cart'] = json_decode($request->cart);
        $data['cartCount'] = count(json_decode($request->cart));
        $data['shopdetails'] = Shop_detail::first();

        $data['price'] = 0;


            foreach ($data['cart'] as $i => $cart) {
            # code...
                if($cart[0]->iid == $itemid){
                    // print("<pre>".print_r($cart,true)."</pre>");
                    $offset = $i;
                    // echo "item in cart ID is ".$cart[0]->iid." so about to remove it on offset ".$offset." and ".$i;
                    array_splice($data['cart'], $offset,1);
                    // print("<pre>".print_r($data['cart'],true)."</pre>");
                }
             }

             $payload= ["payload"=>$data['cart']];

             Cart::where("sessionid","=",$sessionkey)->update($payload);
             // print("<pre>".print_r($data['cart'],true)."</pre>");
             foreach ($data['cart'] as $i => $cart) {
            # code...
            $data['price'] = $data['price'] + ($cart[0]->item_price * $cart[1]->quantity);
            }

        

        return redirect('/cart');
    }
}
