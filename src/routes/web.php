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

//①ログイン画面
Route::post('/login', [UserController::class, 'loginUser']);

//①’会員登録画面
Route::post('/register', [UserController::class, 'storeUser']);

//②’プロフィール画面
Route::get('/mypage/profile', [UserController::class, 'showProfileForm']);
Route::post('/mypage/profile', [UserController::class, 'profile']);

Route::get('/', [UserController::class, 'index']);
//ログイン後の商品一覧画面index.blade.php、ミドルウェア
//Route::middleware('auth')->group(function(){
    //Route::get('/', [UserController::class, 'index']);
//});

