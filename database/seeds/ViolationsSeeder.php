<?php

use Illuminate\Database\Seeder;

class ViolationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Violation::class, 100)->create();
    }
}
