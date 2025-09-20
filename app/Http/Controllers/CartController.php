<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function remove($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Item removed from cart successfully.');
    }

    public function editQuantity(Request $request, $cartId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($cartId);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->back()->with('success', 'Quantity updated successfully.');
    }

    public function getUserCart()
    {
        $userId = Auth::id();
        $carts = Cart::where('customer_id', $userId)->get();
        $items = [];

        foreach ($carts as $cart) {
            if ($cart->package_id && $cart->package) {
                $package = $cart->package;
                $item = new Item([
                    'cart_id' => $cart->id,
                    'item_id' => $package->id,
                    'name' => $package->package_name,
                    'type' => 'package',
                    'quantity' => $cart->quantity,
                    'price' => $package->package_price,
                    'imagePath' => $package->package_image,
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
                ]);
            }

            $items[] = $item;
        }

        return view('cart', ['items' => $items]);
    }
}
