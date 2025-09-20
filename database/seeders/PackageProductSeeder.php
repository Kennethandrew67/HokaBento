<?php

namespace Database\Seeders;

use App\Models\PackageProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages_products = [
            // Paket A: 1 Food, 1 Snack, 1 Dessert
            [
                'package_id' => 1, // Paket A
                'product_id' => 4,  // Spicy Chicken Teriyaki (Food)
            ],
            [
                'package_id' => 1,
                'product_id' => 8,  // Shrimp Roll (Snack)
            ],
            [
                'package_id' => 1,
                'product_id' => 10, // Choco Pudding (Dessert)
            ],

            // Paket B: 1 Food, 1 Snack, 1 Dessert
            [
                'package_id' => 2, // Paket B
                'product_id' => 11, // Miso Ramen (Food)
            ],
            [
                'package_id' => 2,
                'product_id' => 9,  // Takoyaki (Snack)
            ],
            [
                'package_id' => 2,
                'product_id' => 2,  // Salad (Dessert)
            ],

            // Paket C: 1 Food, 1 Snack, 1 Dessert
            [
                'package_id' => 3, // Paket C
                'product_id' => 1,  // Beef Yakiniku (Food)
            ],
            [
                'package_id' => 3,
                'product_id' => 12, // Ebi Furai (Snack)
            ],
            [
                'package_id' => 3,
                'product_id' => 10, // Choco Pudding (Dessert)
            ],

            // Paket D: 1 Food, 1 Snack, 1 Dessert
            [
                'package_id' => 4, // Paket D
                'product_id' => 5,  // Fried Chicken (Food)
            ],
            [
                'package_id' => 4,
                'product_id' => 8,  // Shrimp Roll (Snack)
            ],
            [
                'package_id' => 4,
                'product_id' => 2,  // Salad (Dessert)
            ],

            // Bento Special 1: 1 Food, 2 Snacks, 1 Beverage, 1 Dessert
            [
                'package_id' => 5, // Bento Special 1
                'product_id' => 4,  // Spicy Chicken Teriyaki (Food)
            ],
            [
                'package_id' => 5,
                'product_id' => 8,  // Shrimp Roll (Snack)
            ],
            [
                'package_id' => 5,
                'product_id' => 9,  // Takoyaki (Snack)
            ],
            [
                'package_id' => 5,
                'product_id' => 6,  // Lemon Tea (Beverage)
            ],
            [
                'package_id' => 5,
                'product_id' => 10, // Choco Pudding (Dessert)
            ],

            // Bento Special 2: 1 Food, 2 Snacks, 1 Beverage, 1 Dessert
            [
                'package_id' => 6, // Bento Special 2
                'product_id' => 1,  // Beef Yakiniku (Food)
            ],
            [
                'package_id' => 6,
                'product_id' => 12, // Ebi Furai (Snack)
            ],
            [
                'package_id' => 6,
                'product_id' => 9,  // Takoyaki (Snack)
            ],
            [
                'package_id' => 6,
                'product_id' => 6,  // Lemon Tea (Beverage)
            ],
            [
                'package_id' => 6,
                'product_id' => 10, // Choco Pudding (Dessert)
            ],

            // Bento Special 3: 1 Food, 2 Snacks, 1 Beverage, 1 Dessert
            [
                'package_id' => 7, // Bento Special 3
                'product_id' => 5,  // Fried Chicken (Food)
            ],
            [
                'package_id' => 7,
                'product_id' => 8,  // Shrimp Roll (Snack)
            ],
            [
                'package_id' => 7,
                'product_id' => 9,  // Takoyaki (Snack)
            ],
            [
                'package_id' => 7,
                'product_id' => 7,  // Aqua (Beverage)
            ],
            [
                'package_id' => 7,
                'product_id' => 2,  // Salad (Dessert)
            ],

            // Bento Special 4: 1 Food, 2 Snacks, 1 Beverage, 1 Dessert
            [
                'package_id' => 8, // Bento Special 4
                'product_id' => 11, // Miso Ramen (Food)
            ],
            [
                'package_id' => 8,
                'product_id' => 12, // Ebi Furai (Snack)
            ],
            [
                'package_id' => 8,
                'product_id' => 9,  // Takoyaki (Snack)
            ],
            [
                'package_id' => 8,
                'product_id' => 6,  // Lemon Tea (Beverage)
            ],
            [
                'package_id' => 8,
                'product_id' => 10, // Choco Pudding (Dessert)
            ],
        ];

        foreach ($packages_products as $package_product) {
            PackageProduct::create($package_product);
        }
    }
}
