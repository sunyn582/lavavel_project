<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string|max:500'
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng rỗng');
        }

        // Tính tổng tiền
        $totalAmount = 0;
        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $totalAmount += $product->price * $quantity;
            }
        }

        // Tạo đơn hàng
        $order = auth()->user()->orders()->create([
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'total_amount' => $totalAmount,
            'status' => 'pending'
        ]);

        // Tạo chi tiết đơn hàng
        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $order->orderItems()->create([
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $product->price
                ]);
            }
        }

        // Xóa giỏ hàng
        session()->forget('cart');
        
        return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');
    }

    public function index()
    {
        $orders = auth()->user()->orders()->with('orderItems.product')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Kiểm tra quyền truy cập
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('orders.show', compact('order'));
    }
}