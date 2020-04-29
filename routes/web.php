<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', 'MainController@main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'AdminController@index')->name('admin/home');
Route::get('admin/create_dealer', 'AdminController@create_dealer');
Route::post('admin/store_dealer', 'AdminController@store_dealer')->name('store_dealer');
Route::get('admin/show_dealer', 'AdminController@show_dealer')->name('show_dealer');

Route::get('admin/edit_dealer/{id}', 'AdminController@edit_dealer')->name('edit_dealer');
Route::post('admin/update_dealer', 'AdminController@update_dealer')->name('update_dealer');

Route::get('admin/edit_dealer_password/{id}', 'AdminController@edit_dealer_password')->name('edit_dealer_password');
Route::post('admin/update_dealer_password', 'AdminController@update_dealer_password')->name('update_dealer_password');

Route::get('admin/delete_dealer/{id}', 'AdminController@delete_dealer')->name('delete_dealer');

Route::get('admin/create_taker', 'AdminController@create_taker');
Route::post('admin/store_taker', 'AdminController@store_taker')->name('store_taker');
Route::get('admin/show_taker', 'AdminController@show_taker')->name('show_taker');
Route::get('admin/delete_taker/{id}', 'AdminController@delete_taker')->name('delete_taker');

Route::get('admin/create_rice_amount', 'AdminController@create_rice_amount');
Route::post('admin/store_rice_amount', 'AdminController@store_rice_amount')->name('store_rice_amount');
Route::get('admin/show_rice_amount', 'AdminController@show_rice_amount')->name('show_rice_amount');
Route::post('admin/store_rice_select_ajax', 'AdminController@store_rice_select_ajax')->name('store_rice_select_ajax');

Route::get('admin/edit_rice_amount/{id}', 'AdminController@edit_rice_amount')->name('edit_rice_amount');
Route::post('admin/update_rice_amount', 'AdminController@update_rice_amount')->name('update_rice_amount');

Route::get('admin/delete_rice_amount/{id}', 'AdminController@delete_rice_amount')->name('delete_dealer');

Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@Login');



Route::get('dealer/home', 'DealerController@index')->name('dealer/home');;

Route::get('dealer/find_taker', 'DealerController@find_taker')->name('dealer/find_taker');
Route::post('dealer/action_find_taker', 'DealerController@action_find_taker')->name('action_find_taker');
Route::get('dealer/show_dealer_giving_rice', 'DealerController@show_dealer_giving_rice')->name('show_dealer_giving_rice');
Route::post('dealer/store_dealer_giving_rice', 'DealerController@store_dealer_giving_rice')->name('store_dealer_giving_rice');

Route::get('dealer/check_dealer', 'DealerController@check_dealer')->name('check_dealer');

Route::get('dealer', 'Dealer\LoginController@showLoginForm')->name('dealer.login');
Route::post('dealer', 'Dealer\LoginController@Login');


