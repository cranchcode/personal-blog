<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::insert([
            [
                'username'=>'laz0rde',
                'email'=>'a@a.com',
                'password'=>Hash::make('@Aa123123'),
            ],
            [
                'username'=>'notme',
                'email'=>'b@b.com',
                'password'=>Hash::make('@Aa123123'),
            ]
        ]);
    }
}
