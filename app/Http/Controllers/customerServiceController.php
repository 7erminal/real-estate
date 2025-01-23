<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop_detail;
use App\Models\User;
use App\Models\FAQ;
use App\Models\Cart;
use DB;

class customerServiceController extends Controller
{
    //
    public function showDetails(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');
    	$data['cart'] = json_decode($request->cartItems);

    	$data['cartCount'] = count($data['cart']);

    	$data['shopdetails'] = Shop_detail::first();

    	$data['cart'] = [];
        $data['cartCount'] = 0;

        if(Cart::where('sessionid',$sessionkey)->exists()){
            $cartItems = Cart::where('sessionid',$sessionkey)->first();

            if($cartItems->payload!=NULL){
                $data['cart'] = json_decode($cartItems->payload);
                $data['cartCount'] = count(json_decode($cartItems->payload));
            } else {$data['cartCount'] = 0;}

        } else {
            $cartData = ['sessionid'=>$sessionkey];

            DB::table('carts')->insert($cartData);
        }

    	if(Auth::check()){
    		$userid = Auth::user()->id;

    		$data['user'] = User::find($userid);
    	}

    	return view('customerservice')->with('data',$data);
    }

    public function addComment(Request $request){
    	$firstname = $request->firstname;
    	$lastname = $request->lastname;
    	$email = $request->email;
    	$contact = $request->contact;
    	$comment = $request->comment;

    	$data=['first_name'=>$firstname,'lastname'=>$lastname,'email'=>$email,'contact'=>$contact,'comment'=>$comment];

    	$featureid = DB::table('FAQs')->insertGetId($data);

    	return redirect('/FAQs');
    }

    public function showFAQs (Request $request){
        $sessionkey = $request->session()->get('_token', 'default');

    	$data['shopdetails'] = Shop_detail::first();

    	$data['FAQs'] = FAQ::whereNotNull('answer');

    	$data['cart'] = [];
        $data['cartCount'] = 0;

        if(Cart::where('sessionid',$sessionkey)->exists()){
            $cartItems = Cart::where('sessionid',$sessionkey)->first();

            if($cartItems->payload!=NULL){
                $data['cart'] = json_decode($cartItems->payload);
                $data['cartCount'] = count(json_decode($cartItems->payload));
            } else {$data['cartCount'] = 0;}

        } else {
            $cartData = ['sessionid'=>$sessionkey];

            DB::table('carts')->insert($cartData);
        }

    	return view('faqs')->with('data',$data);
    }

    public function showFAQsAdmin (Request $request){

    	$data['shopdetails'] = Shop_detail::first();

    	$data['FAQs'] = FAQ::all();


    	return view('admin.faq')->with('data',$data);
    }

    public function postAnswer (Request $request){
    	$FAQID = $request->id;
    	$answer = $request->answer;

    	$data = ['answer'=>$answer];

    	FAQ::where('id','=',$FAQID)
            ->update($data);


    	return redirect('admin2/FAQs');
    }
}
