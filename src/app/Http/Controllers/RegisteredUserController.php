<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;//「ユーザーが登録された」というイベントを使います
use Illuminate\Http\Request;//フォームから送られてきたリクエスト情報を扱います
use App\Actions\Fortify\CreateNewUser;//ユーザー作成専用のFortifyアクションを使います（バリデーション・保存・パスワード暗号化を担当）


class RegisteredUserController extends Controller
{
    public function store(
        Request $request,//画面から送られた入力内容全部
        CreateNewUser $creator//ユーザーを作る専門係（Fortify）
    ){
        //入力された情報をもとにユーザーを作成し、「ユーザー登録完了イベント」を発生させる
        event(new Registered($user = $creator->create($request->all())));
        session()->put('unauthenticated_user', $user);//まだ認証が終わっていないユーザー認証をセッション（一時保存）に入れる
        return redirect()->route('verification.notice');//メール認証を案内する画面へ移動する
    }
}
