<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert(
            [
            [
                "id" => 1,
                "name" => 'mai xuan thao',
                "phone" => '0868076222',
                "email" => "nguyenvanA@gmail.com",
                "password" => Hash::make(123456),
                "oder_id" => 1,
            ],
            [
                "id" => 2,
                "name" => 'mai xuan lan',
                "phone" => '0868076222',
                "email" => "nguyenvanB@gmail.com",
                "password" => Hash::make(123456),
                "oder_id" => 2,
                ]
            ]
    );


    }
}
