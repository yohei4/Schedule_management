<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
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

//ログイン画面表示
Route::get('/', [UserController::class,'showLogin'])->name('showLogin');

//ログインの処理
Route::post('/user/login', [UserController::class, 'login'])->name('login');

//ホーム画面
Route::get('home', function() {
    return view('schedule_management.calendar.home');
})->name('home');

//スケジュール入力画面表示
Route::get('schedule', function() {
    return view('schedule_management.calendar.schedule');
})->name('schedule');

//スケジュール登録
Route::post('home', [ScheduleController::class, 'schedule_store'])->name('user.schedule_store'); 



//アカウント作成画面表示
Route::get('account', function () {
    return view('schedule_management.login.account');
})->name('account');

//アカウント作成
Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); 

Route::get('home', [CalendarController::class, 'show'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });