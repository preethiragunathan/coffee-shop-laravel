<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;
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


Route::post('login', [ApiController::class, 'login'])->name('login_api');
Route::post('register', [ApiController::class, 'register']);
Route::get('error', [ApiController::class, 'exception'])->name('error');
Route::group(['middleware' => ['jwt.verify']], function() {
	Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('userprofile', [ApiController::class, 'get_user']);
    Route::get('products', [ApiController::class, 'index']);
	Route::get('wallet', [ApiController::class, 'getWallet']);
	Route::post('wallet/add', [ApiController::class, 'addwallet']);
	Route::get('products', [ApiController::class, 'getProducts']);
	Route::post('order', [ApiController::class, 'orderCreate']);
	Route::post('updateprofile', [ApiController::class, 'edituser']);
	Route::get('myorders', [ApiController::class, 'getOrders']);
	Route::get('transactions', [ApiController::class, 'getTransaction']);
	Route::get('logout', [ApiController::class, 'logout']);
});
