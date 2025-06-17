<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//ログイン後の商品一覧画面index.blade.php、ミドルウェア
Route::middleware('auth')->group(function(){
    Route::get('/', [AuthController::class, 'index']);
});

//ログイン画面
Route::get('/login', [AuthController::class, 'login']);


//会員画面
Route::get('/register', [AuthController::class, 'register']);