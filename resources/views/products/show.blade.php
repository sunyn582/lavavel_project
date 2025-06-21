<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                @if($product->image)
                    <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                    @if($product->category)
                        <span class="badge badge-secondary">{{ $product->category->name }}</span>
                    @endif
                </div>

                @if($product->rating)
                    <div class="flex items-center gap-2">
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $product->rating ? 'fill-yellow-400 text-yellow-400' : 'fill-gray-200 text-gray-200' }}" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600">({{ number_format($product->rating, 1) }}/5)</span>
                    </div>
                @endif

                <div>
                    <span class="text-3xl font-bold text-primary">
                        {{ number_format($product->price, 0, ',', '.') }} đ
                    </span>
                </div>

                <!-- Stock Information -->
                <div class="border-t border-b border-gray-200 py-4">
                    @if($product->stock > 0)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-green-600 font-semibold">Còn {{ $product->stock }} sản phẩm trong kho</span>
                        </div>
                        @if($product->stock <= 10)
                            <p class="text-orange-600 text-sm mt-1 ml-7">⚠️ Chỉ còn ít sản phẩm!</p>
                        @endif
                    @else
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-red-600 font-semibold">Hết hàng</span>
                        </div>
                        <p class="text-gray-600 text-sm mt-1 ml-7">Sản phẩm tạm thời không có sẵn</p>
                    @endif
                </div>

                @if($product->description)
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Mô tả sản phẩm</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                <div class="space-y-4">
                    @auth
                        @if($product->stock > 0)
                            <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <div class="flex items-center gap-4">
                                    <label for="quantity" class="text-sm font-medium">Số lượng:</label>
                                    <input type="number"
                                           id="quantity"
                                           name="quantity"
                                           value="1"
                                           min="1"
                                           max="{{ min($product->stock, 99) }}"
                                           class="input w-20 text-center">
                                    <span class="text-sm text-gray-500">(Tối đa {{ $product->stock }})</span>
                                </div>

                                <button type="submit" class="btn-primary w-full lg:w-auto px-8 py-3 text-lg flex items-center justify-center hover:bg-gray-800 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 1.5M7 13l1.5 1.5M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                    </svg>
                                    Thêm vào giỏ hàng
                                </button>
                            </form>
                        @else
                            <div class="p-4 bg-red-50 rounded-lg border border-red-200">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-red-700 font-medium">Sản phẩm hiện tại hết hàng</span>
                                </div>
                                <p class="text-red-600 text-sm">Vui lòng quay lại sau hoặc liên hệ shop để được thông báo khi có hàng.</p>
                                <button disabled class="mt-3 w-full lg:w-auto px-8 py-3 text-lg bg-gray-300 text-gray-500 rounded-md font-medium cursor-not-allowed flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                    </svg>
                                    Hết hàng
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-gray-600 mb-4">Vui lòng đăng nhập để mua sản phẩm này.</p>
                            <a href="{{ route('login') }}" class="btn-primary">Đăng nhập</a>
                        </div>
                    @endauth

                    <a href="{{ route('welcome') }}" class="btn-outline block text-center w-full lg:w-auto px-8 py-3">
                        Quay lại trang chủ
                    </a>
                </div>
            </div>
        </div>
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