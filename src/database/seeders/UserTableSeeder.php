<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            'name' => 'sample',
            'email' => 'sample@example.com',
            'password' =>Hash::make('sample12'),
            'postal_code' => 370-3521,
            'address' => '群馬県高崎市棟高町'
        ];
        DB::table('users')->insert($user);
    }
}
