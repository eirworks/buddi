<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        factory(\App\User::class)->create([
            'name' => "Developer",
            'email' => 'dev@cc.cc',
            'password' => Hash::make('dev'),
            'admin' => true,
            'activated' => true,
        ]);

        factory(\App\User::class, 10)->create();
    }
}
