<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');

});
//Route::get('/',[RegistrationController::class,'list'])->name('list');
Route::get('/ums/users/registration',[RegistrationController::class,'registration'])->name('ums.users.registration');
Route::post('/ums/users/registration',[RegistrationController::class,'registrationSubmit'])->name('ums.users.registration');

Route::get('/ums/users/list',[RegistrationController::class,'list'])->name('ums.users.list');
Route::get('/ums/users/addproduct',[RegistrationController::class,'Product'])->name('ums.users.addproduct');
Route::post('/ums/users/addproduct',[RegistrationController::class,'ProductSubmit'])->name('ums.users.addproduct');

Route::get('/editproduct/{id}',[RegistrationController::class,'ProductEdit'])->name('ums.users.edit.editproduct');
Route::post('/editproduct',[RegistrationController::class,'ProductEditSubmit'])->name('ums.users.update.editproduct');



Route::get('/ums/users/list/topnav',[RegistrationController::class,'orderList'])->name('ums.users.orderList');

Route::get('/',[RegistrationController::class,'login'])->name('ums.login');
Route::post('/',[RegistrationController::class,'loginSubmit'])->name('ums.login.submit');
Route::get('/ums/users/dashboard',[RegistrationController::class,'dashboard'])->name('ums.dash')->middleware('logged.user');

Route::get('/addtocart/{id}',[RegistrationController::class,'addtocart'])->name('products.addtocart');
Route::get('/deletetocart',[RegistrationController::class,'deletetocart'])->name('products.deletetocart');
Route::get('/show',[RegistrationController::class,'show'])->name('ums.users.show');

Route::get('/search',[RegistrationController::class,'searchProduct'])->name('search');

Route::get('/updateprofile/{id}',[RegistrationController::class,'profileUpdate'])->name('ums.users.edit.profile');
Route::post('/updateprofile',[RegistrationController::class,'profileUpdateSubmit'])->name('ums.users.update.profile');

Route::get('/emptycart',[RegistrationController::class,'emptycart'])->name('products.emptycart');

Route::get('/report',[RegistrationController::class,'Report'])->name('ums.users.report');
Route::post('/report',[RegistrationController::class,'ReportSubmit'])->name('ums.users.report');

Route::get('/cart',[RegistrationController::class,'mycart'])->name('ums.users.cart');
Route::get('/orderslist',[RegistrationController::class,'orderslist'])->name('ums.users.orderlist');
Route::post('/checkout',[RegistrationController::class,'checkout'])->name('checkout');

Route::get('/categorylist',[RegistrationController::class,'CategoryList'])->name('ums.users.categorylist');//->middleware('logged.user');
Route::get('/categorysearch',[RegistrationController::class,'searchCategory'])->name('categorysearch');
Route::get('/CategoryDelete',[RegistrationController::class,'CategoryDelete'])->name('CategoryDelete');
Route::get('/ums/users/addcategory',[RegistrationController::class,'Category'])->name('ums.users.addcategory');
Route::post('/ums/users/addcategory',[RegistrationController::class,'CategorySubmit'])->name('ums.users.addcategory');

Route::get('/editcategory/{id}',[RegistrationController::class,'CategoryEdit'])->name('ums.users.edit.editcategory');
Route::post('/editcategory',[RegistrationController::class,'CategoryEditSubmit'])->name('ums.users.update.editcategory');


Route::get('/logout',function(){
    session()->forget('user');
    session()->flash('msg','');
    return redirect()->route('ums.login');
})->name('logout');

//

