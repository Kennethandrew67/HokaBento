<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackagePromo;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getContent()
    {
        $products = Product::orderBy('created_at', 'desc')->take(5)->get();
        $today = now();

        $validPromotions = Promo::where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->get();

        $promoPackages = collect();
        $promoPackageIds = [];

        foreach ($validPromotions as $promo) {
            $packages = PackagePromo::where('promo_id', $promo->id)->get();

            foreach ($packages as $packagePromo) {
                $packageId = $packagePromo->package_id;
                if (!in_array($packageId, $promoPackageIds)) {
                    $promoPackage = Package::find($packageId);
                    if ($promoPackage) {
                        $promoPackages->push($promoPackage);
                        $promoPackageIds[] = $packageId;
                    }
                }
            }
        }

        return view('home', compact('products', 'promoPackages'));
    }
}
