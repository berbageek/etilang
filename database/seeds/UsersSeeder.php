<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Petugas 1',
            'email' => 'petugas1@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Petugas 2',
            'email' => 'petugas2@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pelanggar 1',
            'email' => 'pelanggar1@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pelanggar 2',
            'email' => 'pelanggar2@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
