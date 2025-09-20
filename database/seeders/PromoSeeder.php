<?php

namespace Database\Seeders;

use App\Models\PackagePromo;
use App\Models\Promo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Promo::create([
            'start_date' => '2024-10-01',
            'end_date' => '2024-12-31',
            'discount' => 20,
        ]);

        $package_promos = [
            [
                'promo_id' => 1,
                'package_id' => 3
            ],

            [
                'promo_id' => 1,
                'package_id' => 5
            ],

            [
                'promo_id' => 1,
                'package_id' => 8
            ],
        ];

        foreach($package_promos as $pp){
            PackagePromo::create($pp);
        }

    }
}
