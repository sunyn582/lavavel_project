<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5'
        ]);
        
        $product = Product::findOrFail($productId);
        
        $product->reviews()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'rating' => $request->rating ?? null,
        ]);
        
        return back()->with('success', 'Đánh giá đã được gửi!');
    }
}