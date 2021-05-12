<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\MyController;
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


Route::get('/home3', [App\Http\Controllers\HomeController::class, 'home3'])->name('home3');

Route::middleware(['is_customer'])->group(function () {
Route::get('/customerhome', [App\Http\Controllers\HomeController::class, 'customerHome'])->name('customerhome');
});

Route::middleware(['is_pos'])->group(function () {

Route::get('/poshome', [App\Http\Controllers\HomeController::class, 'posHome'])->name('poshome');
Route::get('/getCustomer/{id}', [App\Http\Controllers\HomeController::class, 'getCustomer'])->name('getCustomer');



});

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


//excel
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');


Route::post('importProduct', [MyController::class, 'importProduct'])->name('importProduct');
Route::post('importCustomer', [MyController::class, 'importCustomer'])->name('importCustomer');
Route::get('exportCustomer', [MyController::class, 'exportCustomer'])->name('exportCustomer');



//add_product
Route::get('/add_product', [App\Http\Controllers\HomeController::class, 'add_product'])->name('add_product');
Route::post('/saveproduct', [App\Http\Controllers\HomeController::class, 'saveproduct'])->name('saveproduct');
Route::get('/deleteproduct/{id}', [App\Http\Controllers\HomeController::class, 'deleteproduct'])->name('deleteproduct');
Route::get('/editproduct/{id}', [App\Http\Controllers\HomeController::class, 'editproduct'])->name('editproduct');
Route::post('/update_product', [App\Http\Controllers\HomeController::class, 'updateproduct'])->name('update_product');


//customer

Route::get('/addcustomer', [App\Http\Controllers\HomeController::class, 'return_customer'])->name('addcustomer');

//pos
Route::get('/pos_link_customers/{mobile}', [App\Http\Controllers\HomeController::class, 'pos_link_customers'])->name('pos_link_customers');
Route::post('/save_pos_customers', [App\Http\Controllers\HomeController::class, 'save_pos_customers'])->name('save_pos_customers');

Route::get('/delete_pos_customer/{id}', [App\Http\Controllers\HomeController::class, 'delete_pos_customer'])->name('delete_pos_customer');

});








