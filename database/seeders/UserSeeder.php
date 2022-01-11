<?php

namespace Database\Seeders;

use App\Models\User;
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
        // DB::table('users')->insert([
        //     'name' => 'Luis Bahena',
        //     'email' => 'bahenalabz@gmail.com',
        //     'password' => Hash::make('123456'),
        // ]);
        User::factory(5)->create();
    }
}
