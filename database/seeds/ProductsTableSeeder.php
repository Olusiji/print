<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Product();
        $product1->name = "Photobook";
        $product1->save();

        $product1 = new Product();
        $product1->name = "Picture Frame";
        $product1->save();
    }
}
