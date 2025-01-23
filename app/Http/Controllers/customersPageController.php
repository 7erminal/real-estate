<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Shop_detail;
use DB;

class customersPageController extends Controller
{
    //
    public function showCustomers(Request $request){
    	$data['shopdetails'] = Shop_detail::first();

    	$data['customer'] = User::select('users.id','name','avatar','users.email', DB::raw('COUNT(transactions.quantity) as totalitems, SUM(transactions.total_price) as totalprice'), 'transactions.updated_at as processedat')
    				->join('transactions','transactions.user_id','=','users.id')
    		->groupBy('id','name','avatar','email','processedat')
    		->get();

    	return view('admin.customers')->with('data',$data);
    }
}
