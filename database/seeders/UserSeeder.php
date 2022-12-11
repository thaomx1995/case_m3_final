<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $item = new User();
        $item->name = "Mai Xuan Thao";
        $item->email = "thaomx1995@gmail.com";
        $item->password = Hash::make('123456');
        $item->address = 'Quảng Trị';
        $item->phone  = "0868076222";
        $item->image ='thang.jpg';
        $item->gender ='Nam';
        $item->birthday ='2003/11/25';
        $item->group_id ='1';
        $item->image ='thang.ipg';
        $item->save();
    }
}
