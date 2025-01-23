<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories/items/{id}&{type}&{subId}',[App\Http\Controllers\showCategoryItemsController::class, 'showItems']);
Route::get('/updateCart', [App\Http\Controllers\cartController::class, 'updateCart']);

Route::get('/shop/itemdetails/{id}', [App\Http\Controllers\ShowItemImagesController::class, 'getItemImages']);
Route::post('/shop/order', [App\Http\Controllers\TransactionController::class, 'order']);
Route::get('/admin2/fetchItems', [App\Http\Controllers\fetchItemsController::class, 'getItems']); // Test
Route::post('/admin2/removeImage',[App\Http\Controllers\removeItemsController::class, 'removeImage']); // Tests

Route::post('/admin2/postCategory',[App\Http\Controllers\postItemController::class, 'insertCategory']);
Route::post('/admin2/postSubCategories',[App\Http\Controllers\postItemController::class, 'insertSubCategories']);
Route::get('/admin2/get-categories',[App\Http\Controllers\addCategoryPageController::class, 'getCategories']);
Route::get('/admin2/delete-category/{id}',[App\Http\Controllers\postItemController::class, 'deleteCategory']);
Route::get('/admin2/delete-sub-category/{id}',[App\Http\Controllers\postItemController::class, 'deleteSubCategory']);
Route::post('/admin2/edit-sub-category',[App\Http\Controllers\postItemController::class, 'editSubCategory']);
Route::post('/admin2/edit-category',[App\Http\Controllers\postItemController::class, 'editCategory']);
Route::post('/admin2/add-item',[App\Http\Controllers\postItemController::class, 'insertItem']);