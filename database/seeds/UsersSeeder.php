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
        App\User::create([
            'name' => 'Petugas 1',
            'email' => 'petugas1@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        App\User::create([
            'name' => 'Petugas 2',
            'email' => 'petugas2@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->violations()->saveMany(factory(App\Violation::class)->times(10)->make());
        });
    }
}
