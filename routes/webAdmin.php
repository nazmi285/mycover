<?php
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::group(['middleware' => ['throttle', 'auth:admin', 'verified']], function () {
	// dd(Auth::guard());
    Route::get('home', 'HomeController@index')->name('home');

    Route::prefix('user-management')->group(function () {
    	Route::get('admin', 'AdminController@index');
    	Route::get('admin/data', 'AdminController@data');
    	Route::get('user', 'AdminController@index');
    	Route::get('agent', 'AdminController@index');
    	Route::get('customer', 'AdminController@index');
    	Route::get('role', 'RoleController@index');
    	Route::get('permission', 'PermissionController@index');
    });

    Route::prefix('transaction')->group(function () {
    	Route::get('/', 'TransactionController@index');
    });

    Route::prefix('merchant')->group(function () {
    	Route::get('/', 'MerchantController@index');
    	Route::get('role', 'RoleController@index');
    	Route::get('permission', 'PermissionController@index');
    });

   	Route::prefix('settlement')->group(function () {
   		Route::prefix('to-process')->group(function () {
   			Route::get('merchant', 'SettlementController@index');
   			Route::get('agent', 'SettlementController@index');
   		});
    	Route::get('/', 'SettlementController@index');
    });

   	Route::prefix('setting')->group(function () {
   		Route::get('/', 'SettingController@index');
   	});

   	Route::get('profile', function () {
        return view('admin/profile');
    });
});
