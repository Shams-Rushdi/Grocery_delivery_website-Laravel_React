<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\LoginApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
Route::get('/product/list',[APIController::class,'Productlist']);//->middleware('APIAuth');
Route::post('/product/add',[APIController::class,'Productadd']);
Route::get('/product/editproduct/{id}',[APIController::class,'EditProduct']);
Route::put('/product/updateproduct/{id}',[APIController::class,'UpdateProduct']);
Route::delete('/product/delete/{id}',[APIController::class,'DeleteProduct']);
//Route::post('/login',[APIController::class,'login']);
//....................................Category...............................................................
Route::get('/category/list',[APIController::class,'Categorylist']);//->middleware('APIAuth');
Route::post('/category/add',[APIController::class,'CategoryAdd']);
Route::get('/category/edit/{id}',[APIController::class,'EditCategory']);
Route::put('/category/update/{id}',[APIController::class,'UpdateCategory']);
Route::delete('/category/delete/{id}',[APIController::class,'DeleteCategory']);
//...................................orderDetails...........................................................
Route::get('/order/list',[APIController::class,'Orderlist']);
//...................................Report...........................................................
Route::get('/report/list',[APIController::class,'Reportlist']);

//...................................Customer...........................................................
Route::get('/Customer/list',[APIController::class,'Customerlist']);//->middleware('APIAuth');
Route::post('/Customer/add',[APIController::class,'CustomerAdd']);
Route::get('/Customer/edit/{id}',[APIController::class,'EditCustomer']);
Route::put('/Customer/update/{id}',[APIController::class,'UpdateCustomer']);
Route::delete('/Customer/delete/{id}',[APIController::class,'DeleteCustomer']);

//authenticationf
Route::post ('/register',[LoginApiController::class,'Register']);
Route::post ('/login',[LoginApiController::class,'Login']);
Route::put('/logout',[LoginApiController::class,'Logout']);



 