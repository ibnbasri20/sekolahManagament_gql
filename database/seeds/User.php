<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama'  => 'demo',
            'username'  => 'demo',
            'password'  => Hash::make('demo')
        ]);
    }
}
