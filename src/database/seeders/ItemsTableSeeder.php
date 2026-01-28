<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Like;

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
        $params = [
        [
            'name' => '腕時計',
            'price' => 15000,
            'brand' => 'Rolex',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'image_url' => 'img/mens_clock.jpg',
            'user_id' => 2,
            'condition_id' => Condition::$UNUSED,
        ],
        [
            'name' => 'HDD',
            'price' => 5000,
            'brand' => '西芝',
            'description' => '高速で信頼性の高いハードディスク',
            'image_url' => 'img/hard_disk.jpg',
            'user_id' => 2,
            'condition_id'=> Condition::$HARMLESS,
        ],
        [
            'name' => '玉ねぎ３束',
            'price' => 300,
            'brand' => '',
            'description' => '新鮮な玉ねぎ３束のセット',
            'image_url' => 'img/onion.jpg',
            'user_id' => 2,
            'condition_id' => Condition::$HARMED,
        ],
        [
            'name' => '革靴',
            'price' => 4000,
            'brand' => '',
            'description' => 'クラシックなデザインの革靴',
            'image_url' => 'img/leather_shoes.jpg',
            'user_id' => 2,
            'condition_id' => Condition::$BAD_CONDITION,
        ],
        [
            'name' => 'ノートPC',
            'price' => 45000,
            'brand' => '',
            'description' => '高性能なノートパソコンノートパソコン',
            'image_url' => 'img/laptop_PC.jpg',
            'user_id'=> 2,
            'condition_id' => Condition::$UNUSED,
        ],
        [
            'name' => 'マイク',
            'price' => 8000,
            'brand' => '',
            'description' => '高音質のレコーディング用マイク',
            'image_url' => 'img/mic.jpg',
            'user_id' => 2,
            'condition_id' => Condition::$HARMLESS,
        ],
        [
            'name' => 'ショルダーバック',
            'price' => 3500,
            'brand' => '',
            'description' => 'おしゃれなショルダーバック',
            'image_url' => 'img/shoulder.jpg',
            'user_id'=> 1,
            'condition_id' => Condition::$HARMED,
        ],
        [
            'name' => 'タンブラー',
            'price' => 500,
            'brand' => '',
            'description' => '使いやすいタンブラー',
            'image_url' => 'img/tumbler.jpg',
            'user_id' => 1,
            'condition_id' => Condition::$BAD_CONDITION,
        ],
        [
            'name' => 'コーヒーミル',
            'price' => 4000,
            'brand' => 'Starbacks',
            'description' => '手動のコーヒーミル',
            'image_url' => 'img/coffer_mill.jpg',
            'user_id' => 1,
            'condition_id' => Condition::$UNUSED,
        ],
        [
            'name' => 'メイクセット',
            'price' => 2500,
            'brand' => '',
            'description' => '便利なメイクアップセット',
            'image_url' => 'img/make_set.jpg',
            'user_id' => 1,
            'condition_id' => Condition::$HARMLESS
        ],
    ];

    $range = count($params);
    for($i = 0; $i < $range; $i++){
        Item::create($params[$i]);
    }

    Like::create([
        'user_id' => 1,
        'item_id' => 1,
    ]);
    Like::create([
        'user_id' => 2,
        'item_id' => 7,
    ]);
    }
}
