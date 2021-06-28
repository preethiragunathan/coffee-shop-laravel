<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;

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


Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('profile', [Controller::class, 'getProfile'])->name('user.profile');
Route::get('wallet', [Controller::class, 'getWallet'])->name('user.wallet');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login');
Route::get('registration', [LoginController::class, 'showRegisterForm'])->name('register');
Route::get('logout', [Controller::class, 'logout'])->name('user.logout');
Route::post('registration/post', [LoginController::class, 'registration'])->name('post.register');
Route::post('login/post', [LoginController::class, 'login'])->name('post.login');
Route::post('wallet/deposite', [Controller::class, 'addAmount'])->name('add.wallet');
Route::get('myorders', [Controller::class, 'MyOrders'])->name('myorder');
Route::get('transactions', [Controller::class, 'MyTransactions'])->name('mytrans');
Route::get('ChangePassword', [Controller::class, 'ChangePassword'])->name('user.change.password');
Route::post('User/password/Update', [Controller::class, 'UserpasswordUpdate'])->name('user.password.update');
Route::post('order/place', [Controller::class, 'orderplace'])->name('place.order');
