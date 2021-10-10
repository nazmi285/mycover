<?php

use Illuminate\Support\Facades\Route;
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

Route::domain('agent.' . env('APP_URL'))->group(function () {

    Route::get('/', function () {
        return view('products');
    });
    Route::get('/quotation', function () {
        return view('quotation');
    });
    Route::get('/checkout', function () {
        return view('checkout');
    });

});


Route::get('/', function () {
    return view('welcome');
    // return redirect('login');
});

Auth::routes(['verify' => true]);
//Google Authentication Routes
Route::get('auth/google', 'SocialController@redirectToGoogle');
Route::get('auth/google/callback', 'SocialController@googleCallback');

Route::get('/store',function(){
	return view('public');
})->name('store');


Route::group(['middleware' => ['auth', 'verified']], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/profile', function () {
        return view('profile');
    });

	Route::get('/product', 'HomeController@index')->name('product');

});	
