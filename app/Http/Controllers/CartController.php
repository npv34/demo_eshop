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



}
