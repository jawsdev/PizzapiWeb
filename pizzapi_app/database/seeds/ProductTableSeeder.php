<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'img/pizza_menu/the_shire.jpg',
            'title' => 'The Shire',
            'description' => 'Tomato Mozzarella Broccoli',
            'price' => 12
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'img/pizza_menu/goomba.jpg',
            'title' => 'Goomba',
            'description' => 'Tomato Mozzarella Mushroom',
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'img/pizza_menu/kekoa.jpg',
            'title' => 'Kekoa',
            'description' => 'Tomato Mozzarella Pineapple Ham',
            'price' => 13
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'img/pizza_menu/pepperoni_ninja.jpg',
            'title' => 'Pepperoni Ninja',
            'description' => 'Tomato Mozzarella Pepperoni',
            'price' => 11
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'img/pizza_menu/smokey_joes.jpg',
            'title' => 'Smokey Joes',
            'description' => 'Tomato Mozzarella Jalapeno Red Pepper',
            'price' => 16
        ]);
        $product->save();
    }
}
