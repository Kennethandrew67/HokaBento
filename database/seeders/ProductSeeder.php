<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'product_name'  => 'Beef Yakiniku',
                'product_type'  => 'Food',
                'product_point' => 3,
                'product_price' => 46500,
                'product_image' => 'imges/products/beef-yakiniku.png',
            ],
            [
                'product_name'  => 'Salad',
                'product_type'  => 'Dessert',
                'product_point' => 2,
                'product_price' => 20000,
                'product_image' => 'imges/products/salad.png',
            ],
            [
                'product_name'  => 'Cold Ocha',
                'product_type'  => 'Beverages',
                'product_point' => 1,
                'product_price' => 10000,
                'product_image' => 'imges/products/ocha.png',
            ],
            [
                'product_name'  => 'Spicy Chicken Teriyaki',
                'product_type'  => 'Food',
                'product_point' => 3,
                'product_price' => 45000,
                'product_image' => 'imges/products/spicy-chichken.png',
            ],
            [
                'product_name'  => 'Fried Chicken',
                'product_type'  => 'Food',
                'product_point' => 2,
                'product_price' => 24000,
                'product_image' => 'imges/products/fried-chichken.png',
            ],
            [
                'product_name'  => 'Lemon Tea',
                'product_type'  => 'Beverages',
                'product_point' => 1,
                'product_price' => 12000,
                'product_image' => 'imges/products/lemontea.png',
            ],
            [
                'product_name'  => 'Aqua',
                'product_type'  => 'Beverages',
                'product_point' => 1,
                'product_price' => 9000,
                'product_image' => 'imges/products/Aqua.png',
            ],
            [
                'product_name'  => 'Shrimp Roll',
                'product_type'  => 'Snack',
                'product_point' => 1,
                'product_price' => 10000,
                'product_image' => 'imges/products/shrimproll.png',
            ],
            [
                'product_name'  => 'Takoyaki',
                'product_type'  => 'Snack',
                'product_point' => 1,
                'product_price' => 8000,
                'product_image' => 'imges/products/takoyaki.png',
            ],
            [
                'product_name'  => 'Choco Pudding',
                'product_type'  => 'Dessert',
                'product_point' => 1,
                'product_price' => 12000,
                'product_image' => 'imges/products/pudding.png',
            ],
            [
                'product_name'  => 'Miso Ramen',
                'product_type'  => 'Food',
                'product_point' => 3,
                'product_price' => 42000,
                'product_image' => 'imges/products/miso-ramen.png',
            ],
            [
                'product_name'  => 'Ebi Furai',
                'product_type'  => 'Snack',
                'product_point' => 2,
                'product_price' => 20000,
                'product_image' => 'imges/products/ebifurai.png',
            ],
            ];
            foreach ($products as $product) {
                Product::create($product);
            }
    }
}
