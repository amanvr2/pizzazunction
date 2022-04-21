<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prize', function () {
    return view('prize');
});

Route::post('/prize-save','MenuController@prize');

Route::get('/menu','MenuController@index');

Route::get('/deals', 'MenuController@deals');

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/go', function () {
    return view('test');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'HomeController@viewCart');

Route::get('/add-tocart/{id}', 'HomeController@addTocart');


Route::get('/edit-product/{id}', 'HomeController@editIncart');

Route::get('/delete-product/{id}', 'HomeController@deleteFromcart');

Route::get('/place-order', 'HomeController@placeOrder')->name('placeOrder');

Route::get('/my-orders', 'HomeController@myOrders');

Route::get('/order-details/{id}', 'HomeController@orderDetails');

Route::get('editcart-product/{id}', 'HomeController@editIncartProduct');

 




/////////////////////////   payment routes //////////////////////////////////////////

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('/process-transaction/{grandTotal}', [PayPalController::class, 'processTransaction']);
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');








///////////////////////////////////  admin //////////////////////////////////////////////


Route::get('/admin-login', function () {
    return view('admin.adminlogin');
});

Route::get('/admin-auth', 'adminController@login');

Route::get('/admin-dashboard', 'adminController@authCheck');

Route::post('/deal-save','adminController@store');

Route::get('/my-details', 'adminController@mydetails');

Route::get('/show-deal/{id}', 'adminController@showdeal');

Route::post('/edit-deal/{id}', 'adminController@editdeal');

Route::get('/delete-deal/{id}', 'adminController@deletedeal');

Route::get('/users', 'adminController@viewusers');

Route::get('/admin-logout','adminController@logout');

