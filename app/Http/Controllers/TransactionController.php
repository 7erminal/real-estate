<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Transaction;
use App\Models\PurchasedItem;

class TransactionController extends Controller
{
    //
    public function order(Request $request){

    // Get request parameters
    	$items = $request->input('cart');
    	$totalQuantity = $request->input('totalQuantity');
    	$totalUnique = $request->input('itemsInCart');
    	$totalPrice = $request->input('totalPrice');

        // Payment Method $paymentMethod = $request->input('paymentMethod');
        $paymentMethod = 2;


    // Insert into transactions table
    	$data = ['quantity'=>$totalQuantity, 'unique_item_quantity'=>$totalUnique, 'payment_method_id'=>$paymentMethod, 'total_price'=>$totalPrice, 'processed'=>0];


    	$transactionid = Transaction::insertGetId($data);

    // Insert into purchased items table
    	$data = [];

    	foreach ($items as $key => $item) {
    		# code...
    		$id = $item[0]['iid'];
    		$quantity = $item[1]['quantity'];
    		$selectedSize = $item[0]['available_sizes'];
    		$selectedColor = $item[0]['available_colors'];
    		$price = $item[0]['item_price'] * $quantity;

    		$data = ['transaction_id'=>$transactionid, 'item_id'=>$id, 'quantity'=>$quantity, 'size'=>$selectedSize, 'color'=>$selectedColor, 'price'=>$price];

    		// array_push($data, $addItems);
    		DB::table('purchased_items')->insert($data);

            $updatedata=["frozen_quantity"=>DB::raw('frozen_quantity + '.$quantity)];

            DB::table('item_quantity')->where('item_id','=',$id)
                ->update($updatedata);
    	}

    	// DB::table('purchased_items')->insert($data);
    	// PurchasedItem::insert($data);

    	$purchase['purchaseid'] = $transactionid;
    	$purchase['totalQuantity'] = $totalQuantity;
    	$purchase['totalPrice'] = $totalPrice;
    
    	return $purchase;
    }
}
