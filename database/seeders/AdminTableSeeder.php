<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([


                "id" => 3,
                "admin_name" => 'nguyen van B',
                "admin_email" => "nguyenvanB@gmail.com",
                "admin_password" => md5(123456),
                "admin_phone" => "0868076221",
                "admin_image" => "http://127.0.0.1:8000/public/images/giay-the-thao-nike-wmns-air-jordan-1-low-gym-red-black-dc0774-016-mau-do-den-616e8a1636dc5-1910202116042211.jpg",




        ]);
    }
}
