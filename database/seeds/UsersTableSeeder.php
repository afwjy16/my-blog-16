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
        \App\User::create([
            'name'  => 'afif',
            'email' => 'afwjy@gmail.com',
            'password'  => bcrypt('rahasia'),
            'type' => '1',
    ]);
    }
}
