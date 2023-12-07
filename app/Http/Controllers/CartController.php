<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });
        // var_dump($cartItems);
        return view('cart', compact('cartItems', 'totalPrice'));
    }
    public function addToCart(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'You need to log in to add items to the cart.');
        }
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $product = Product::findOrFail($productId);
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->input('quantity'),
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully');
    }

        public function editCart(Request $request, $cartId)
        {
            $request->validate([
                'quantity' => 'required|integer|min:1',
            ]);

            $cartItem = Cart::findOrFail($cartId);
            $cartItem->update([
                'quantity' => $request->input('quantity'),
            ]);

            return redirect()->route('cart.index')->with('success', 'Cart item updated successfully');
        }

    public function deleteFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully');
    }
}
