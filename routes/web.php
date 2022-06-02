<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,AuthController};

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

Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout'); 
    Route::get('/show', [HomeController::class, 'show'])->name('show');
    Route::post('/registerPhoneNumber', [HomeController::class, 'registerPhoneNumber'])->name('registerPhoneNumber');
    Route::post('/sendCustomMessage', [HomeController::class, 'sendCustomMessage'])->name('sendCustomMessage');
}); 