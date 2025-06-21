@extends('layouts.app')
@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Danh sách sản phẩm</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="card overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <!-- Product Image -->
                <div class="aspect-square overflow-hidden bg-gray-100">
                    @if($product->image && filter_var($product->image, FILTER_VALIDATE_URL))
                        <img src="{{ $product->image }}"
                             alt="{{ $product->name }}"
                             loading="lazy"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @elseif($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             loading="lazy"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @else
                        @php
                            $categoryType = match($product->category_id) {
                                1 => 'electronics',
                                2 => 'beauty',
                                3 => 'clothing',
                                default => 'default'
                            };
                        @endphp
                        <x-product-placeholder :category="$categoryType" :name="$product->name" />
                    @endif
                </div>
                
                <!-- Product Info -->
                <div class="card-content">
                    <h3 class="font-semibold text-lg text-gray-900 mb-2 line-clamp-2">
                        <a href="{{ route('products.show', $product->id) }}" 
                           class="hover:text-blue-600 transition-colors duration-200">
                            {{ $product->name }}
                        </a>
                    </h3>
                    
                    @if($product->description)
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                    @endif
                    
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xl font-bold text-red-600">
                            {{ number_format($product->price) }} VNĐ
                        </span>
                        
                        @if(isset($product->rating) && $product->rating > 0)
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-sm text-gray-600 ml-1">{{ number_format($product->rating, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Stock Information -->
                    <div class="mb-4">
                        @if($product->stock > 0)
                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-green-600 font-medium">Còn {{ $product->stock }} sản phẩm</span>
                            </div>
                        @else
                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-red-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-red-600 font-medium">Hết hàng</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Add to Cart Button -->
                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="w-full btn-primary flex items-center justify-center space-x-2 hover:bg-gray-800 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.8 9.2M7 13l2.5-2.5m0 0L12 8l2.5 2.5M12 8v4m0-4V4"></path>
                                </svg>
                                <span>Thêm vào giỏ</span>
                            </button>
                        </form>
                    @else
                        <button disabled class="w-full bg-gray-300 text-gray-500 px-4 py-2 rounded-md font-medium cursor-not-allowed flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                            </svg>
                            <span>Hết hàng</span>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    
    @if($products->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Không có sản phẩm</h3>
            <p class="mt-1 text-sm text-gray-500">Hiện tại chưa có sản phẩm nào được thêm vào.</p>
        </div>
    @endif
    
    <!-- Pagination if needed -->
    @if(method_exists($products, 'links'))
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection