<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            "id" => 1,
            "admin_name" => 'nguyen van A',
            "admin_email" => "nguyenvanA@gmail.com",
            "admin_password" => Hash::make(123),
            "admin_phone" => "123",

        ]);
    }
}
