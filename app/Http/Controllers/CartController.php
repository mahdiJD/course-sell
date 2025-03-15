<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            $message = 'Product removed from cart successfully!';
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'count' => 1,
            ]);
            $message = 'Product added to cart successfully!';
        }

        // return back()->with('success', $message);
    }

    public function update(Request $request,$id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update(['count' => $request->count]);
        // return back()->with('success', 'Cart updated successfully!');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        // return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
    }
}
