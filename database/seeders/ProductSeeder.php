<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            ['name' => 'Veggie Sandwich ', 'quantity' => 22, 'price' => 60, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'photo' => 'sandwich.jpg'],
            ['name' => 'Sushi', 'quantity' => 50, 'price' => 40, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'photo' => 'sushi.jpg'],
            ['name' => 'Hamburger', 'quantity' => 40, 'price' => 50, 'description' => 'Varius sit amet mattis vulputate. Posuere morbi leo urna molestie at elementum.', 'photo' => 'hamburger.jpg'],
            ['name' => 'Pizza', 'quantity' => 33, 'price' => 80, 'description' => 'Mi bibendum neque egestas congue quisque egestas diam in arcu.', 'photo' => 'pizza.jpg']
        ];


        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'description' => $product['description'],
                'photo' => $product['photo'],
            ]);
        }
    }
}
