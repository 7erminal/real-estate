<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Shop_detail;
use Illuminate\Support\Facades\DB;

class getTransactionsController extends Controller
{
    //
    public function showDetails(){
    	$data['transactions'] = Transaction::orderBy('transactions.created_at','desc')
    								->join('payment_methods','transactions.payment_method_id','=','payment_methods.id')
    								->select('*','transactions.id as t_id')
    								->paginate(20);

    	$data['shopdetails'] = Shop_detail::first();

    	return view('admin.transactions')->with('data',$data);
    }
}
