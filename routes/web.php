<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Shop_detail;
use App\Models\Purpose;
use App\Models\Category;
use App\Models\Item;
use App\Models\Feature;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/', function (Request $request) {
	$sessionkey = $request->session()->get('_token', 'default');

	$data['purposes']= Purpose::get();

    $data['features']= Feature::get();

	$data['shopdetails'] = Shop_detail::first();

	$data['categories']= Category::with('subCategories')->get();

	$data['count'] = 3;

	Log::info("categories data is ");
	Log::info($data['categories']);


   	$data['newListings'] = Item::leftJoin('categories','items.category','=','categories.category_name')
    		->join('item_prices','item_prices.item_id','=','items.id')
    		->join('item_images','items.item_image_id','=','item_images.id')
    		->join('item_quantity','items.id','=','item_quantity.item_id')
    		->select('*','items.id as iid','item_images.image_path as item_image_path', 'categories.id as categoryid')
    		->orderBy('items.created_at','desc')
    		->take(3)
    		->get();

	$data['cart'] = [];
    $data['cartCount'] = 0;

    	if(Cart::where('sessionid',$sessionkey)->exists()){
			$cartItems = Cart::where('sessionid',$sessionkey)->first();

    		if(trim($cartItems->payload)!=NULL){
    			$data['cart'] = json_decode($cartItems->payload);
    			$data['cartCount'] = count(json_decode($cartItems->payload));
    		} else {$data['cartCount'] = 0;}

    	} else {
    		$cartData = ['sessionid'=>$sessionkey];

    		DB::table('carts')->insert($cartData);
    	}

    return view('index')->with('data',$data);
});

Route::get('/admin2', function () {
	// $data['count'] = Transaction::count();
	$data['count'] = Transaction::selectRaw('COUNT(*) as count,sum(quantity) as quantity,sum(total_price) as total_price')
		->first();

	$data['shopdetails'] = Shop_detail::first();

	$data['customers'] = User::selectRaw('COUNT(*) as numberofcustomers')
							->first();

    // return $data2->count." and ".$data['count'];

    return view('admin.index')->with('data',$data);
});

Route::get('/admin2/forms-advanced',[App\Http\Controllers\routeController::class, 'advancedForm']);
Route::get('/admin2/forms-basic',[App\Http\Controllers\routeController::class, 'basicForm']);
Route::get('/admin2/ui-grids',[App\Http\Controllers\routeController::class, 'uigrid']);
Route::get('/admin2/addItem',[App\Http\Controllers\addItemPageController::class, 'addItem']);
Route::get('/admin2/addCategory',[App\Http\Controllers\addCategoryPageController::class, 'addCategory']);
Route::get('/admin2/addFeatures',[App\Http\Controllers\addFeaturesPageController::class, 'addFeatures']);
Route::get('/admin2/shopDetails',[App\Http\Controllers\shopDetailsPageController::class, 'showDetails']);
Route::get('/admin2/paymentDetails',[App\Http\Controllers\paymentDetailsPageController::class, 'showDetails']);
Route::get('/admin2/customers',[App\Http\Controllers\customersPageController::class, 'showCustomers']);
Route::get('/admin2/about',[App\Http\Controllers\aboutPageController::class, 'showDetails']);
Route::get('/admin2/legal',[App\Http\Controllers\aboutPageController::class, 'showLegalDetails']);
Route::get('/admin2/transactions',[App\Http\Controllers\getTransactionsController::class, 'showDetails']);
Route::get('/admin2/FAQs',[App\Http\Controllers\customerServiceController::class, 'showFAQsAdmin']);
Route::post('/admin2/postAnswer',[App\Http\Controllers\customerServiceController::class, 'postAnswer']);

Route::post('/admin2/postItem',[App\Http\Controllers\postItemController::class, 'insertItem']);
Route::post('/admin2/postCategory',[App\Http\Controllers\postItemController::class, 'insertCategory']);
Route::post('/admin2/postFeature',[App\Http\Controllers\postItemController::class, 'insertFeature']);
Route::post('/admin2/postPurpose',[App\Http\Controllers\postItemController::class, 'insertPurpose']);
Route::get('/admin2/selecteditems',[App\Http\Controllers\removeItemsController::class, 'removeitems']);
Route::get('/admin2/saveItem',[App\Http\Controllers\saveItemController::class, 'saveItem']);
Route::get('/admin2/saveMore',[App\Http\Controllers\saveItemController::class, 'saveMore']);
Route::get('/admin2/itemimages',[App\Http\Controllers\ShowItemImagesController::class, 'getItemImages']);
Route::post('/admin2/saveMoreImages',[App\Http\Controllers\saveItemController::class, 'saveMoreImages']);
Route::post('/admin2/removeImage',[App\Http\Controllers\removeItemsController::class, 'removeImage']);
Route::post('/admin2/saveShopDetails',[App\Http\Controllers\savePersonalDetailsController::class, 'saveShopDetails']);
Route::post('/admin2/saveShopAboutDetails',[App\Http\Controllers\savePersonalDetailsController::class, 'saveShopAboutDetails']);
Route::post('/admin2/saveShopAboutDetails',[App\Http\Controllers\savePersonalDetailsController::class, 'saveShopLegalDetails']);
Route::post('/admin2/savePaymentDetails',[App\Http\Controllers\savePersonalDetailsController::class, 'savePaymentDetails']);
Route::post('/admin2/processTransaction',[App\Http\Controllers\processTransactionController::class, 'processTransaction']);

Route::get('/admin2/addImagesPage',[App\Http\Controllers\addImagesPageController::class, 'addImagesPage']);
Route::post('/admin2/addImages',[App\Http\Controllers\postItemController::class, 'addImages']);



Route::get('/categories',[App\Http\Controllers\showCategoryItemsController::class, 'categoryid']);
// Route::get('/categories','showCategoryItemsController@showItems');
Route::get('/viewItem',[App\Http\Controllers\viewItemController::class, 'viewItem']);
Route::get('/viewItemdesc/{itemid}',[App\Http\Controllers\viewItemController::class, 'viewItem']);

Route::get('/cart',[App\Http\Controllers\cartController::class, 'cart']);
Route::get('/checkout',[App\Http\Controllers\checkoutController::class, 'checkout']);
Route::get('/about',[App\Http\Controllers\aboutPageController::class, 'showAbout']);
Route::get('/termsandconditions',[App\Http\Controllers\aboutPageController::class, 'showAbout']);
Route::get('/privacypolicy',[App\Http\Controllers\aboutPageController::class, 'showAbout']);
Route::get('/customerservice',[App\Http\Controllers\customerServiceController::class, 'showDetails']);
Route::post('/addComment',[App\Http\Controllers\customerServiceController::class, 'addComment']);
Route::get('/FAQs',[App\Http\Controllers\customerServiceController::class, 'showFAQs']);

Route::post('/receipt',[App\Http\Controllers\checkoutController::class, 'placeorder']);
Route::get('/receipt',function(){
	return redirect('/');
});

Route::post('/removeCartItem',[App\Http\Controllers\cartController::class, 'removeItem']);

Route::get('/logout',function (Request $request) {
		
		Auth::logout();

    	return redirect('/');

	// return view('auth.login')->with('data',$data);
});

Route::get('/myaccount',[App\Http\Controllers\myaccountController::class, 'myaccount']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


require __DIR__.'/auth.php';
