<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tazul Islam',
            'email' => 'developer@developer.com',
            'password' => bcrypt('secret')
        ]);
    }
}
