<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-4">Cửa hàng trực tuyến</h1>

            <!-- Category Filter -->
            <div class="flex flex-wrap gap-2 mb-4">
                <a href="{{ route('welcome') }}" class="btn-primary {{ !request('category') ? 'bg-primary text-primary-foreground' : 'btn-outline' }}">
                    Tất cả
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('welcome', ['category' => $category->slug]) }}" 
                       class="btn-outline {{ request('category') == $category->slug ? 'bg-primary text-primary-foreground' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="card overflow-hidden hover:shadow-md transition-shadow">
                    <a href="{{ route('products.show', $product->id) }}">
                        <div class="card-header p-0">
                            <div class="aspect-square relative bg-gray-100">
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
                        </div>
                    </a>
                    <div class="card-content p-4">
                        <a href="{{ route('products.show', $product->id) }}">
                            <h3 class="text-lg font-semibold mb-2 hover:text-primary transition-colors">{{ $product->name }}</h3>
                        </a>
                        <p class="text-sm text-muted-foreground mb-2">{{ Str::limit($product->description, 80) }}</p>
                        
                        @if($product->rating)
                            <div class="flex items-center gap-1 mb-2">
                                <svg class="w-4 h-4 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <span class="text-sm">{{ number_format($product->rating, 1) }}</span>
                            </div>
                        @endif
                        
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-lg font-bold text-red-600">
                                {{ number_format($product->price, 0, ',', '.') }} VNĐ
                            </span>
                            @if($product->category)
                                <span class="badge badge-secondary text-xs">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>
                        
                        <!-- Stock Information -->
                        <div class="mb-2">
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
                    </div>
                    <div class="card-footer p-4 pt-0">
                        @auth
                            @if($product->stock > 0)
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn-primary w-full flex items-center justify-center hover:bg-gray-800 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 1.5M7 13l1.5 1.5M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                        </svg>
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            @else
                                <button disabled class="w-full bg-gray-300 text-gray-500 px-4 py-2 rounded-md font-medium cursor-not-allowed flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                    </svg>
                                    Hết hàng
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn-outline w-full block text-center">
                                Đăng nhập để mua
                            </a>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <p class="text-muted-foreground text-lg">Không có sản phẩm nào trong danh mục này.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="success-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 3000);
        </script>
    @endif
</x-app-layout>
