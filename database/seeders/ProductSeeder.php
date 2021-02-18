<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->name = "Product $i";
            $product->price = rand(1000, 10000);
            $product->desc = "Product Desc $i";
            $product->save();
        }
    }
}
