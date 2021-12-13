<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'gestionnaire',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('gestionnaire'),
            'role' => 'gestion',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('user'),
            'role' => 'user',
        ]);
    }
}
