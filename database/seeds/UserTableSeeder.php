<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'money' => 1000,
            'username' => 'Jon',
        ]);
        DB::table('user')->insert([
            'money' => 1000,
            'username' => 'Smith',
        ]);
    }
}
