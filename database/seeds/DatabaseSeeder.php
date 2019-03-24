<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'role'=>'Admin'
        ]);
        DB::table('user_roles')->insert([
            'role'=>'Member'
        ]);

        DB::table('users')->insert([
            'email'=>'admin@pokemart.com',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);

        DB::table('elements')->insert([
            'element'=>'Fire'
        ]);
        DB::table('elements')->insert([
            'element'=>'Water'
        ]);
    }
}
