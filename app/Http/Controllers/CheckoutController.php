<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Payment;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function createTransaction(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'payment_id' => 'required|exists:payments,id',
        ]);

        $userId = Auth::id();

        $transactionHeader = TransactionHeader::create([
            'transaction_date' => now(),
            'customer_id' => $userId,
            'branch_id' => $request->branch_id,
            'payment_id' => $request->payment_id,
        ]);

        $carts = Cart::where('customer_id', $userId)->with('package', 'product')->get();

        $totalProductPoints = 0;

        foreach ($carts as $cart) {
            if ($cart->package_id && $cart->package) {
                $package = $cart->package;
                $products = $package->products;

                foreach ($products as $product) {
                    $totalProductPoints += $product->product_point * $cart->quantity;
                }

                TransactionDetail::create([
                    'header_id' => $transactionHeader->id,
                    'package_id' => $package->id,
                    'promo_id' => $request->promo[$package->id] ?? null,
                    'quantity' => $cart->quantity,
                    'price' => $package->package_price,
                ]);
            } elseif ($cart->product_id && $cart->product) {
                $product = $cart->product;

                TransactionDetail::create([
                    'header_id' => $transactionHeader->id,
                    'product_id' => $product->id,
                    'promo_id' => null,
                    'quantity' => $cart->quantity,
                    'price' => $product->product_price,
                ]);
            }
        }

        $user = Auth::user();
        $user->increment('member_point', $totalProductPoints);

        Cart::where('customer_id', $userId)->delete();

        return redirect()->route('get.history')->with('success', 'Transaction created successfully!');
    }

    public function getUserCart()
    {
        $branches = Branch::all();
        $payments = Payment::with('bank')->get();
        $userId = Auth::id();
        $carts = Cart::where('customer_id', $userId)->with('package.promos', 'product')->get();
        $items = [];
        $today = now();

        foreach ($carts as $cart) {
            if ($cart->package_id && $cart->package) {
                $package = $cart->package;

                $validPromos = $package->promos->filter(function ($promo) use ($today) {
                    return $promo->start_date <= $today && $promo->end_date >= $today;
                });

                $item = new Item([
                    'cart_id' => $cart->id,
                    'item_id' => $package->id,
                    'name' => $package->package_name,
                    'type' => 'package',
                    'quantity' => $cart->quantity,
                    'price' => $package->package_price,
                    'imagePath' => $package->package_image,
                    'promos' => $validPromos,
                ]);
            } elseif ($cart->product_id && $cart->product) {
                $product = $cart->product;

                $item = new Item([
                    'cart_id' => $cart->id,
                    'item_id' => $product->id,
                    'name' => $product->product_name,
                    'type' => 'product',
                    'quantity' => $cart->quantity,
                    'price' => $product->product_price,
                    'imagePath' => $product->product_image,
                    'promos' => [],
                ]);
            }

            $items[] = $item;
        }

        return view('checkout', [
            'items' => $items,
            'branches' => $branches,
            'payments' => $payments
        ]);
    }
}
