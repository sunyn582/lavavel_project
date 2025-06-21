<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Middleware đã được định nghĩa trong routes, không cần ở đây
    }

    public function index()
    {
        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi thanh toán.');
        }

        $total = $this->calculateTotal($cart);
        
        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'payment_method' => 'required|in:cod,bank_transfer',
            'notes' => 'nullable|string|max:1000',
        ]);

        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống.');
        }

        $total = $this->calculateTotal($cart);

        DB::beginTransaction();
        
        try {
            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $total,
                'shipping_address' => $request->shipping_address,
                'phone' => $request->phone,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'paid',
                'order_status' => 'processing',
                'notes' => $request->notes,
            ]);

            // Tạo các item trong đơn hàng
            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                
                if (!$product) {
                    throw new \Exception("Sản phẩm không tồn tại: " . $productId);
                }

                // Kiểm tra tồn kho
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Sản phẩm {$product->name} chỉ còn {$product->stock} trong kho.");
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['quantity'],
                ]);

                // Trừ tồn kho
                $product->decrement('stock', $item['quantity']);
            }

            // Xóa giỏ hàng sau khi đặt hàng thành công
            session()->forget('cart');

            DB::commit();

            return redirect()->route('checkout.success', $order->id)
                ->with('success', 'Đặt hàng thành công! Mã đơn hàng: ' . $order->id);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function success($orderId)
    {
        $order = Order::with(['items.product', 'user'])
            ->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}