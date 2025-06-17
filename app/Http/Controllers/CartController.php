<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $productId)
    {
        $cart = session('cart', []);
        $cart[$productId] = ($cart[$productId] ?? 0) + 1;
        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }

    public function remove($productId)
    {
        $cart = session('cart', []);
        unset($cart[$productId]);
        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }
}