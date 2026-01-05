<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;/*Seeder(データ登録用クラス)を使う”親クラス” */
use Illuminate\Support\Carbon;/* 日時・時間を扱うCarbonという便利な道具を使う */
use Illuminate\Support\Facades\Hash;/* パスワードを安全に暗号化するHash機能を使う */
use App\Models\User;/* userテーブルを操作するためにUserモデルを使う */


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [/*これから「ユーザー情報のセット」をつくる */
            'name' => '一般ユーザー1',
            'email' => 'general1@gmail.com',
            'email_verified_at' => Carbon::now(),/*メール認証済みの日時を「今」にする (=このユーザーはメール認証済み扱い）*/
            'password' => Hash::make('password'),/* パスワードは「password」だけど、そのまま保存せず、ハッシュ化（暗号化）して保存する*/
        ];
        User::create($param);/* さっき作った $param の内容で userテーブルに一件ユーザーを登録する */

        $param = [
            'name' => '一般ユーザー2',
            'email' => 'general2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ];
        User::create($param);
    }
}
