<?php

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
        DB::table('users')->insert([
            'user' => 'mcouso',
            'email' => 'mcouso@gmail.com',
            'password' => Hash::make('1234'),
            'estat'=> 'Actiu',

        ]);
        DB::table('users')->insert([
            'user' => 'vcastillo',
            'email' => 'vcastillo@gmail.com',
            'password' => Hash::make('1234'),
            'estat'=> 'Actiu',

        ]);
    }
}
