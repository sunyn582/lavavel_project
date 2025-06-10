@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Giá: {{ number_format($product->price) }} VNĐ</p>
    <p>{{ $product->description }}</p>
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button type="submit">Thêm vào giỏ</button>
    </form>
    <hr>
    <h3>Đánh giá sản phẩm</h3>
    @auth
        <form action="{{ route('reviews.store', $product->id) }}" method="POST">
            @csrf
            <textarea name="content" rows="2" required></textarea>
            <button type="submit">Gửi đánh giá</button>
        </form>
    @else
        <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để đánh giá.</p>
    @endauth
    <ul>
        @foreach($product->reviews as $review)
            <li>
                <b>{{ $review->user->name ?? 'Ẩn danh' }}:</b> {{ $review->content }}
            </li>
        @endforeach
    </ul>
@endsection