<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::get('/', [AdminController::class, 'login'])->name('login');
Route::get('home', [AdminController::class, 'home'])->name('index');
Route::post('adminlogin', [AdminController::class, 'loginPost'])->name('admin.post.login');

Route::get('adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

// ******products****** //
Route::get('Product', [AdminController::class, 'Product'])->name('product');
Route::get('Product/form', [AdminController::class, 'ProductForm'])->name('product.form');
Route::post('Product/Add', [AdminController::class, 'ProductAdd'])->name('product.add');
Route::get('Product/Edit/{id}', [AdminController::class, 'ProductEdit'])->name('product.edit');
Route::post('Product/Update', [AdminController::class, 'ProductUpdate'])->name('product.update');
Route::get('Product/Delete{id}', [AdminController::class, 'ProductDelete'])->name('product.delete');

// ******Customers****** //
Route::get('Customer', [AdminController::class, 'Customer'])->name('customer');
Route::get('Customer/form', [AdminController::class, 'CustomerForm'])->name('customer.form');
Route::post('Customer/Add', [AdminController::class, 'CustomerAdd'])->name('customer.add');
Route::get('Customer/Edit/{id}', [AdminController::class, 'CustomerEdit'])->name('customer.edit');
Route::post('Customer/Update', [AdminController::class, 'CustomerUpdate'])->name('customer.update');
Route::get('Customer/Delete{id}', [AdminController::class, 'CustomerDelete'])->name('customer.delete');

// ******Profile****** //
Route::get('Profile', [AdminController::class, 'Profile'])->name('profile');
Route::get('Profile/Edit', [AdminController::class, 'ProfileEdit'])->name('profile.edit');
Route::post('profileUpdate', [AdminController::class, 'profileUpdate'])->name('profile.update');

// ******Change Password****** //
Route::get('changepassword', [AdminController::class, 'ChangePassword'])->name('change.password');
Route::post('passwordUpdate', [AdminController::class, 'passwordUpdate'])->name('password.update');


// ******Customers Order****** //
Route::get('Orders', [AdminController::class, 'Order'])->name('order');
Route::get('Order/Edit/{id}', [AdminController::class, 'OrderEdit'])->name('order.edit');
Route::post('Order/Update', [AdminController::class, 'OrderUpdate'])->name('order.update');
Route::get('Order/Delete{id}', [AdminController::class, 'OrderDelete'])->name('order.delete');
