<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //php artisan db:seed --class UserSeeder
        DB::table('users')->insert([
            "name"=>"liaqat",
            "email"=>"liaqat@gmail.com",
            "password"=>Hash::make("liaqat")
        ]);
    }
}
