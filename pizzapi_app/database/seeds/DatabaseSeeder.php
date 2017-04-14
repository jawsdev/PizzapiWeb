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
        //$this->call(ProductTableSeeder::class);
        //$this->call(AddToProductTableSeeder::class);
        //$this->call(SidesTableSeeder::class);
        //$this->call(RoleTableSeeder::class);
        //$this->call(UserTableSeeder::class);
        DB::table('products')->insert([
            'imagePath' => 'img/drinks_menu/pepsi_can.jpg',
            'title' => 'Pepsi',
            'description' => '250ml',
            'price' => 1,
            'type' => 'drink'
        ]);
    }
}
