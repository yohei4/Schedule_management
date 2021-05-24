<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

//アカウント作成画面表示
Route::get('/', function () {
    return view('account');
})->name('account');

//アカウント作成
Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); 


