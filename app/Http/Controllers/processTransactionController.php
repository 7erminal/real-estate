<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchaseditem;
use App\Models\Transaction;
use DB;

class processTransactionController extends Controller
{
    //
    public function processTransaction(Request $request){
    	$transactionid = $request->transactionid;
    	$status = $request->processStatus;


    	if($status == '1'){
    		$data['items'] = Purchaseditem::where('transaction_id','=',$transactionid)
    						->get();

    					

    		foreach ($data['items'] as $i => $item) {
    			# code...
    			$updatedata=["quantity_available"=>DB::raw('quantity_available - '.$item->quantity), "frozen_quantity"=>DB::raw('frozen_quantity - '.$item->quantity)];

    			DB::table('item_quantity')->where('item_id','=',$item->item_id)
    			->update($updatedata);
    		}


    		$data = ['processed'=>1];
    		Transaction::where('id','=',$transactionid)
    					->update($data);
    	}
    	


    	return redirect('admin2/transactions');
    }
}
