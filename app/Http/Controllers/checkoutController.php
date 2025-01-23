<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop_detail;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use DB;

class checkoutController extends Controller
{
    //
    public function checkout(Request $request){

    	$data['cart'] = json_decode($request->cartItems);


    	$data['cartCount'] = count($data['cart']);	
    	
    	

    	$data['shopdetails'] = Shop_detail::first();
		$data['categories']= Category::with('subCategories')->get();

    	$data['paymentmethods'] = PaymentMethod::all();

    	if(empty($data['cart'])){
    		$data['price'] = 0;
    		return view('cart')->with('data',$data);
    	}

    	$userid=0;

    	if(Auth::check()){
    		$userid = Auth::user()->id;

    		$data['user'] = User::find($userid);
    	}

    	$data['price'] = 0;
    	$data['quantity'] = 0;

    	foreach ($data['cart'] as $i => $cart) {
    		# code...
    		$data['price'] = $data['price'] + ($cart[0]->item_price * $cart[1]->quantity);
    		$data['quantity'] = $data['quantity'] + $cart[1]->quantity;
    	}


    	 return view('checkout')->with('data',$data);
    	 
    }

    public function placeorder(Request $request){
    	$data['cart'] = json_decode($request->cartItems);

    	$data['cartCount'] = count($data['cart']);

    	$data['shopdetails'] = Shop_detail::first();
		$data['categories']= Category::with('subCategories')->get();
    	// Get request parameters
    	// $items = $request->input('cart');
    	if(empty($data['cart'])){
    		$data['price'] = 0;
    		return view('cart')->with('data',$data);
    	}

    	$totalQuantity = $request->input('totalQuantity');
    	$totalUnique = count($data['cart']);
    	$totalPrice = $request->input('totalPrice');

    	$userid = 2;

    	if(Auth::check()){
    		$userid = Auth::user()->id;
    	}

        // Payment Method $paymentMethod = $request->input('paymentMethod');
        $paymentmethodid = $request->paymentmethod;


    // Insert into transactions table
    	$dataValue = ['quantity'=>$totalQuantity, 'unique_item_quantity'=>$totalUnique, 'payment_method_id'=>$paymentmethodid, 'total_price'=>$totalPrice, 'processed'=>0,'user_id'=>$userid];


    	$transactionid = Transaction::insertGetId($dataValue);

    // Insert into purchased items table

    	// echo json_encode($data['cart']);

    	foreach ($data['cart'] as $key => $item) {
    		# code...
    		// echo json_encode($item[0]);
    		$id = $item[0]->iid;
    		$quantity = $item[1]->quantity;
    		$selectedSize = $item[0]->available_sizes;
    		$selectedColor = $item[0]->available_colors;
    		$price = $item[0]->item_price * $quantity;

    		$dataValue = ['transaction_id'=>$transactionid, 'item_id'=>$id, 'quantity'=>$quantity, 'size'=>$selectedSize, 'color'=>$selectedColor, 'price'=>$price];

    		// array_push($data, $addItems);
    		DB::table('purchased_items')->insert($dataValue);

            $updatedata=["frozen_quantity"=>DB::raw('frozen_quantity + '.$quantity)];

            DB::table('item_quantity')->where('item_id','=',$id)
                ->update($updatedata);
    	}

    	// DB::table('purchased_items')->insert($data);
    	// PurchasedItem::insert($data);

    	$data['purchaseid'] = $transactionid;
    	$data['totalQuantity'] = $totalQuantity;
    	$data['totalPrice'] = $totalPrice;

    	$firstname = $request->firstname;

    	$lastname = "";
    	if($request->has('lastname')){
    		$lastname = $request->lastname;
    	}
    	
    	$country = $request->country;
    	$state = $request->state;
    	$zip = "";
    	if($request->has('zip')){
    		$zip = $request->zip;
    	}
    	
    	$email = $request->email;
    	$contact = $request->contact;

    	$dataValue = ['transaction_id'=>$transactionid, 'first_name'=>$firstname, 'last_name'=>$lastname, 'country'=>$country, 'state'=>$state, 'zip_code'=>$zip, 'email_address'=>$email, 'payment_method'=>$paymentmethodid, 'phone_number'=>$contact];

    	$data['cart'] = [];
		$data['cartCount'] = 0;

    	DB::table('payment_information')->insert($dataValue);
		$request->session()->regenerate();
    
    	return view('receipt')->with('data',$data);
    }
}
