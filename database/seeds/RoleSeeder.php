<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var \App\Role $role1
         */
        $role1 = App\Role::create(['name' => 'Petugas']);
        $user1 = App\User::find(1);
        $user2 = App\User::find(2);

        $user1->roles()->save($role1);
        $user2->roles()->save($role1);

        $role2 = App\Role::create(['name' => 'Verifikator']);
        $user3 = App\User::find(3);
        $user3->roles()->save($role2);
    }
}
