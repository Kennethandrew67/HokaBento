<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $packages = [
            [
                'package_name' => 'Paket A',
                'package_price' => 56500,
                'package_image' => 'imges/products/paketA.png'
            ],
            [
                'package_name' => 'Paket B',
                'package_price' => 50000,
                'package_image' => 'imges/products/paket B.png'
            ],
            [
                'package_name' => 'Paket C',
                'package_price' => 56500,
                'package_image' => 'imges/products/paketc.png'
            ],
            [
                'package_name' => 'Paket D',
                'package_price' => 50500,
                'package_image' => 'imges/products/paketd.png'
            ],
            [
                'package_name' => 'Bento Special 1',
                'package_price' => 59500,
                'package_image' => 'imges/products/bento1.png'
            ],
            [
                'package_name' => 'Bento Special 2',
                'package_price' => 64500,
                'package_image' => 'imges/products/bento2.png'
            ],
            [
                'package_name' => 'Bento Special 3',
                'package_price' => 64500,
                'package_image' => 'imges/products/bento3.png'
            ],
            [
                'package_name' => 'Bento Special 4',
                'package_price' => 64500,
                'package_image' => 'imges/products/bento4.png'
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
