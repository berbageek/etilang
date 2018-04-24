<?php

use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $station1 = App\Station::create([
            'address' => 'Jl. Terusan Jakarta',
        ]);

        $station2 = App\Station::create([
            'address' => 'Jl. Pasteur',
        ]);

        /**
         * @var \App\Station $station3
         */
        $station3 = App\Station::create([
            'address' => 'Jl. Pahlawan',
        ]);

        /**
         * @var \App\User $user1
         */
        $user1 = App\User::find(1);
        $user1->stations()->saveMany([$station1, $station2]);

        /**
         * @var \App\User $user2
         */
        $user2 = App\User::find(2);
        $user2->stations()->saveMany([$station2, $station3]);
    }
}
