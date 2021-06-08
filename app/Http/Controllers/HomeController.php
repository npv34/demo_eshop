<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $productsTrending = Product::all();
        return view('eshop.home', compact('productsTrending'));
    }
}
