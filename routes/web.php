<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductContoller;
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

 Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_admin');
Route::get('/customerhome', [App\Http\Controllers\HomeController::class, 'customerHome'])->name('customerhome');




Route::middleware(['is_admin'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save_product', [App\Http\Controllers\ProductContoller::class, 'saveproduct'])->name('save_product');
Route::get('/add_customers_info', [App\Http\Controllers\HomeController::class, 'addcustomers'])->name('add_customers_info');
Route::post('/save_customers_info', [App\Http\Controllers\HomeController::class, 'customers_info'])->name('save_customers_info');
Route::get('/update_user_profile', [App\Http\Controllers\HomeController::class, 'update_profile_user'])->name('update_user_profile');
Route::post('/save_user_profile', [App\Http\Controllers\HomeController::class, 'save_user_profile'])->name('save_user_profile');






Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'return_dashboard'])->name('dashboard');
Route::get('/add_customer', [App\Http\Controllers\HomeController::class, 'create'])->name('add_customer');
Route::post('/save_customer', [App\Http\Controllers\HomeController::class, 'store'])->name('save_customer');
Route::get('/view_customer', [App\Http\Controllers\HomeController::class, 'show'])->name('view_customer');
Route::get('/deletecustomer/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('deletecustomer');
Route::get('/editcustomer/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('editcustomer');
Route::post('/update_customer', [App\Http\Controllers\HomeController::class, 'update'])->name('update_customer');
Route::get('/delivertoken/{id}', [App\Http\Controllers\HomeController::class, 'deliver_token'])->name('delivertoken');
Route::post('/save_token', [App\Http\Controllers\HomeController::class, 'savetoken'])->name('save_token');
Route::get('/issuetoken/{id}', [App\Http\Controllers\HomeController::class, 'issue_token'])->name('issuetoken');
Route::post('/save_issue_token', [App\Http\Controllers\HomeController::class, 'save_issue_token'])->name('save_issue_token');
Route::get('/customer_history', [App\Http\Controllers\HomeController::class, 'customerhistory'])->name('customer_history');


Route::post('/update_customer_account', [App\Http\Controllers\HomeController::class, 'update_customer_account'])->name('update_customer_account');

//delivery boy
Route::get('/add_pos', [App\Http\Controllers\HomeController::class, 'add_point_of_sale'])->name('add_pos');
Route::post('/save_pos', [App\Http\Controllers\HomeController::class, 'savepos'])->name('save_pos');
Route::get('/deletepos/{id}', [App\Http\Controllers\HomeController::class, 'deletepos'])->name('deletepos');
Route::get('/editpos/{id}', [App\Http\Controllers\HomeController::class, 'editpos'])->name('editpos');
Route::post('/update_pos', [App\Http\Controllers\HomeController::class, 'updatepos'])->name('update_pos');


});








