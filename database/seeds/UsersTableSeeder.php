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
        DB::table('users')->insert(array([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'foto' => 'admin.png',
            'level' => 1
        ]));

        DB::table('users')->insert(array([
            'name'=>'user',
            'email'=>'user@example.com',
            'password'=>bcrypt('user'),
            'foto'=>'user.png',
            'level'=>2
        ]));
    }
}
