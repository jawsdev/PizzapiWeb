<?php

use Illuminate\Database\Seeder;

class SidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $side = new \App\Sides([
            'imagePath' => 'img/sides_menu/the_shire.jpg',
            'title' => 'Fries',
            'description' => 'Crispy organic maris piper potato fries',
            'price' => 2
        ]);
        $side->save();

        $side = new \App\Sides([
            'imagePath' => 'img/sides_menu/guacamole.jpg',
            'title' => 'Guacamole',
            'description' => 'Freshly made from the finest avocados!',
            'price' => 1
        ]);
        $side->save();

        $side = new \App\Sides([
            'imagePath' => 'img/sides_menu/curry_potatoes.jpg',
            'title' => 'Curry Potatoes',
            'description' => 'A Spicy addition to your main',
            'price' => 4
        ]);
        $side->save();
    }
}
