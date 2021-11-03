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
            ['name' => 'Cemita ', 'quantity' => 22, 'price' => '', 'description' => '', 'photo' => ''],
            ['name' => '', 'quantity' => '', 'price' => '', 'description' => '', 'photo' => ''],
            ['name' => '', 'quantity' => '', 'price' => '', 'description' => '', 'photo' => ''],
            ['name' => '', 'quantity' => '', 'price' => '', 'description' => '', 'photo' => '']
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
