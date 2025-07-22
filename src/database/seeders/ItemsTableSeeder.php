<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '腕時計',
            'price' => 15000,
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'condition' => '良好',
            'image_url' => 'storage/images/腕時計.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'HDD',
            'price' => 5000,
            'description' => '高速で信頼性の高いハードディスク',
            'condition' => '目立った傷や汚れなし',
            'image_url' => 'storage/images/HDD+Hard+Disk.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => '玉ねぎ３束',
            'price' => 300,
            'description' => '新鮮な玉ねぎ３束のセット',
            'condition' => 'やや傷や汚れあり',
            'image_url' => 'storage/images/玉ねぎ.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => '革靴',
            'price' => 4000,
            'description' => 'クラシックなデザインの革靴',
            'condition' => '状態が悪い',
            'image_url' => 'storage/images/革靴.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'ノートPC',
            'price' => 45000,
            'description' => '高性能なノートパソコンノートパソコン',
            'condition' => '良好',
            'image_url' => 'storage/images/ノートPC.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'マイク',
            'price' => 8000,
            'description' => '高音質のレコーディング用マイク',
            'condition' => '目立った傷や汚れなし',
            'image_url' => 'storage/images/マイク.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'ショルダーバック',
            'price' => 3500,
            'description' => 'おしゃれなショルダーバック',
            'condition' => 'やや傷や汚れあり',
            'image_url' => 'storage/images/ショルダーバッグ.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'タンブラー',
            'price' => 500,
            'description' => '使いやすいタンブラー',
            'condition' => '状態が悪い',
            'image_url' => 'storage/images/タンブラー.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'コーヒーミル',
            'price' => 4000,
            'description' => '手動のコーヒーミル',
            'condition' => '良好',
            'image_url' => 'storage/images/コーヒーミル.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'メイクセット',
            'price' => 2500,
            'description' => '便利なメイクアップセット',
            'condition' => '目立った傷や汚れなし',
            'image_url' => 'storage/images/外出メイクアップセット.jpg'
        ];
        DB::table('items')->insert($param);
    }
}
