<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getAll(Request $request)
    {
        $query = $request->input('query');

        if ($query) {

            $packages = Package::where('package_name', 'like', "%$query%")->paginate(10);
            $products = Product::where('product_name', 'like', "%$query%")->paginate(10);
        } else {
            $packages = Package::all();
            $products = Product::paginate(10);
        }

        return view('menu', compact('packages', 'products'));
    }

    public function AddCart(Request $request)
    {
        $customerId = $request->input('customer_id');
        $quantity = $request->input('quantity');
        if ($request->input('product_id')) {
            $productId = $request->input('product_id');
            $product = Product::find($productId);

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }

            $cartItem = Cart::where('customer_id', $customerId)
                ->where('product_id', $productId)
                ->whereNull('package_id')
                ->first();

            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $quantity,
                ]);
            } else {
                Cart::create([
                    'customer_id' => $customerId,
                    'product_id' => $productId,
                    'package_id' => null,
                    'quantity' => $quantity,
                ]);
            }

        } elseif ($request->input('package_id')) {
            $packageId = $request->input('package_id');
            $package = Package::find($packageId);

            if (!$package) {
                return redirect()->back()->with('error', 'Package not found.');
            }

            $cartItem = Cart::where('customer_id', $customerId)
                ->where('package_id', $packageId)
                ->whereNull('product_id')
                ->first();

            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $quantity,
                ]);
            } else {
                Cart::create([
                    'customer_id' => $customerId,
                    'package_id' => $packageId,
                    'product_id' => null,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Please select a valid item.');
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }
}
