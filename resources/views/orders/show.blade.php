@extends('layouts.app')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <h1>Đơn hàng #{{ $order->id }}</h1>
    <ul>
        @foreach($order->orderItems as $item)
            <li>{{ $item->product->name }} - Số lượng: {{ $item->quantity }}</li>
        @endforeach
    </ul>
@endsection