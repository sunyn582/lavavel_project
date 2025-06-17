@extends('layouts.app')
@section('title', 'Danh sách sản phẩm')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-4">
                <h3>
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->name }}
                    </a>
                </h3>
                <p>Giá: {{ number_format($product->price) }} VNĐ</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Thêm vào giỏ</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection