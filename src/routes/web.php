<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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


Route::get('/',[ItemController::class, 'index'])->name('items.list');//商品一覧画面（トップ画面）
Route::get('/item/{item}', [ItemController::class, 'detail'])->name('item.detail');//商品詳細画面
Route::get('/item',[ItemController::class, 'search']);//検索画面

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/sell',[ItemController::class, 'sellView']);//商品出品画面表示
    Route::post('/sell', [ItemController::class, 'sellCreate']);//商品出品画面登録
    Route::post('/item/like/{item_id}', [LikeController::class, 'create']);
    Route::post('/item/unlike/{item_id}', [LikeController::class, 'destroy']);
    Route::post('/item/comment/{item_id}', [CommentController::class, 'create']);//コメント登録
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->middleware('purchase')->name('purchase.index');//商品購入画面
    Route::post('/purchase/{item_id}', [PurchaseController::class, 'purchase'])->middleware('purchase');//商品購入画面登録
    Route::get('/purchase/{item_id}/success', [PurchaseController::class, 'success']);
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'address']);//送付先住所変更画面表示
    Route::post('/purchase/address/{item_id}', [PurchaseController::class, 'updateAddress']);//送付先住所変更画面登録
    Route::get('/mypage', [UserController::class, 'mypage']);//プロフィール画面
    Route::get('/mypage/profile', [UserController::class, 'profile']);//プロフィール編集画面表示
    Route::post('/mypage/profile', [UserController::class, 'updateProfile']);//プロフィール編集画面登録
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('email');//ログイン画面
Route::post('/register', [RegisteredUserController::class, 'store']);//会員登録

Route::get('/email/verify', function(){
    return view('auth.verify-email');
})->name('verification.notice');//メール認証画面表示

Route::post('/email/verification-notification', function(Request $request) {
    session()->get('unauthenticated_user')->sendEmailVerificationNotification();
    session()->put('resent', true);
    return back()->with('message', 'Verification link sent!');
})->name('verification.send');//認証メールが未完了に対して、認証メールを再送する

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();
    session()->forget('unauthenticated_user');
    return redirect('mypage/profile');
})->name('verification.verify');//認証メール内のリンクをクリックすると、メール認証を完了し、プロフィール設定画面へ遷移

//①ログイン画面
//Route::post('/login', [UserController::class, 'loginUser']);

//①’会員登録画面
//Route::post('/register', [UserController::class, 'storeUser']);

//②’プロフィール編集画面（設定画面）
//Route::get('/mypage/profile', [UserController::class, 'showProfileForm']);
//Route::post('/mypage/profile', [UserController::class, 'profile']);


//商品一覧画面
//Route::get('/', [UserController::class, 'index']);
//ログイン後の商品一覧画面index.blade.php、ミドルウェア
//Route::middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'index']);
//});

//Route::get('/item/{id}',[ItemController::class, 'item']);

//プロフィール画面
//Route::get('/mypage',[UserController::class,]);
