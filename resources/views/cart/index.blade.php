@extends('layouts.app')
@section('title', 'Giỏ hàng')
@section('content')
    <h1>Giỏ hàng</h1>
    @if(!$cart)
        <p>Bạn chưa có sản phẩm nào trong giỏ.</p>
    @else
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <ul>
                @foreach($cart as $productId => $quantity)
                    <li>
                        {{ $products[$productId]->name }} - Số lượng: {{ $quantity }}
                        <form action="{{ route('cart.remove', $productId) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Xóa</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <button type="submit">Đặt hàng</button>
        </form>
    @endif
@endsection