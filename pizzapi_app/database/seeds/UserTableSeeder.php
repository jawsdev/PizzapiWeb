<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_pizzaiolo = Role::where('name', 'Pizzaiolo')->first();
        $role_manager = Role::where('name', 'Manager')->first();

        $pizzaiolo = new User();
        $pizzaiolo->first_name = 'Peter';
        $pizzaiolo->last_name = 'Pizzaiolo';
        $pizzaiolo->email = 'pizzaiolo@pizzapi.uk';
        $pizzaiolo->password = bcrypt('fosters');
        $pizzaiolo->address =  '4 Deerlands Cl, Sheffield S5 8AF';
        $pizzaiolo->phone_number = '07700900637';
        $pizzaiolo->save();
        $pizzaiolo->roles()->attach($role_pizzaiolo);

        $manager = new User();
        $manager->first_name = 'Mandy';
        $manager->last_name = 'Manager';
        $manager->email = 'manager@pizzapi.uk';
        $manager->password = bcrypt('fosters1');
        $manager->address =  '63 Kensington Dr, Great Holm, Milton Keynes MK8 9AW';
        $manager->phone_number = '07700900044';
        $manager->save();
        $manager->roles()->attach($role_manager);


    }
}
