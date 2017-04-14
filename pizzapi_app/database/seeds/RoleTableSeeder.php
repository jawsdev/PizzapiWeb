<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_customer = new Role();
        $role_customer->name = 'Customer';
        $role_customer->description = 'A normal User';
        $role_customer->save();

        $role_pizzaiolo = new Role();
        $role_pizzaiolo->name = 'Pizzaiolo';
        $role_pizzaiolo->description = 'Pizza Makers';
        $role_pizzaiolo->save();

        $role_manager = new Role();
        $role_manager->name = 'Manager';
        $role_manager->description = 'Manager has admin rights';
        $role_manager->save();
    }
}
