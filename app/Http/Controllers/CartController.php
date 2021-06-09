<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()
    {

        $cart = session('cart');
        return view('eshop.cart.index', compact('cart'));
    }

    function addToCart($productId): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($productId);
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($product);
        session()->put('cart', $newCart);
        return redirect()->route('cart.index');
    }

    public function updateQuantityProduct(Request $request, $productId) {
        $product = Product::findOrFail($productId);
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->updateQuantity($product, $request->newQuantity);
        session()->put('cart', $newCart);

        $data = [
            'status' => 'success',
            'message' => 'Cap nhat gio hanh thanh cong',
            'cart' => session('cart')
        ];

        return response()->json($data);

    }


}
