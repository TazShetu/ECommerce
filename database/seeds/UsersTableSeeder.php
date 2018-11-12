<?php

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
        App\User::create([
            'name' => 'ADMIN',
            'email' => 'a@g.com',
            'password' => bcrypt('123456'),
            'is_admin' => 1
        ]);
        App\User::create([
            'name' => 'TAZ',
            'email' => 't@g.com',
            'password' => bcrypt('123456')
        ]);
    }
}
