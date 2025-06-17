@extends('layouts.app')
@section('title', 'Đơn hàng của tôi')
@section('content')
    <h1>Đơn hàng của tôi</h1>
    <ul>
        @foreach($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order->id) }}">
                    Đơn #{{ $order->id }} ({{ $order->created_at->format('d/m/Y') }})
                </a>
            </li>
        @endforeach
    </ul>
@endsection