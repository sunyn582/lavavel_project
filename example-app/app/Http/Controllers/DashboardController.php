<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = OrderItem::sum(DB::raw('price * quantity'));
        $totalUsers = User::count();
        
        // Thêm thống kê chi tiết hơn
        $recentOrders = Order::with('user', 'orderItems.product')
            ->latest()
            ->take(5)
            ->get();
            
        $topProducts = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->take(5)
            ->get();
        
        return view('dashboard.admin', compact(
            'totalProducts', 
            'totalOrders', 
            'totalRevenue', 
            'totalUsers',
            'recentOrders',
            'topProducts'
        ));
    }
    
    public function index()
    {
        // Dashboard cho user thường
        $userOrders = auth()->user()->orders()
            ->with('orderItems.product')
            ->latest()
            ->take(5)
            ->get();
            
        return view('dashboard.index', compact('userOrders'));
    }
}