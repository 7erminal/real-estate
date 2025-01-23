<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use DB;

class savePersonalDetailsController extends Controller
{
    //
    /* This is the function that will be called to update
    the details of the shop. 
    Details of the shop will be used in the main site.
    */
    public function saveShopDetails(Request $request){
        $shopname = $request->shopname;
        $contactnumber = $request->contactnumber;
        $address = $request->address;

        $modifiedFilepath="";

        if($request->hasFile('imageFile')){
          Log::debug("File found");

          $uploadFile = $request->file('imageFile');
          $filename = time().$uploadFile->getClientOriginalName();
          $modifiedFilepath = 'shop-details/'.$filename;
          $currencyid = 1;

          Storage::disk('local')->putFileAs(
              'public/shop-details',
              $uploadFile,
              $filename
            );

            Log::debug("File uploaded");
        }

        $data1 = ['shop_name'=>$shopname,'contact_number'=>$contactnumber,'address'=>$address,'logo'=>$modifiedFilepath];

        $data2 = ['shop_name'=>$shopname,'contact_number'=>$contactnumber,'address'=>$address];

        $modifiedFilepath=="" ? $data=$data2 : $data=$data1;

      $shopid = DB::table('shop_details')->update($data);

      return redirect('admin2/shopDetails');

      }// Fin

      //
    /* This is the function that will be called to update
    the about section of details of the shop. 
    Details of the shop will be used in the main site.
    */
    public function saveShopAboutDetails(Request $request){
        $about = $request->about;
       

        $data = ['about'=>$about];

      $shopid = DB::table('shop_details')->update($data);

      return redirect('admin2/about');

      }// Fin


      /* This is the function that will be called to update
    the about section of details of the shop. 
    Details of the shop will be used in the main site.
    */
    public function saveShopLegalDetails(Request $request){
        $termsandconditions = $request->termsandconditions;
        $privacypolicy = $request->privacypolicy;
       

        $data = ['terms_and_conditions'=>$termsandconditions, 'privacy_policy'=>$privacypolicy];

      $shopid = DB::table('shop_details')->update($data);

      return redirect('admin2/legal');

      }// Fin


      /* This is the function that will be called to update
    the payment details of the shop. 
    Details of the shop will be used in the main site.
    */
    public function savePaymentDetails(Request $request){
        $collectionaccount = $request->collectionaccount;
        $shopid = 1;
       

        $data = ['collection_account'=>$collectionaccount];

      $shopid = DB::table('payment_details')->update($data);

      return redirect('admin2/paymentDetails');

      }// Fin
}
