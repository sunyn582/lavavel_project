<x-app-layout>
    @if(!Auth::check())
        <div class="container mx-auto px-4 py-8">
            <div class="card max-w-md mx-auto">
                <div class="card-content text-center py-8">
                    <svg class="w-16 h-16 mx-auto mb-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <p class="text-lg mb-4">Vui lòng đăng nhập để xem giỏ hàng.</p>
                    <a href="{{ route('login') }}" class="btn-primary">Đăng nhập</a>
                </div>
            </div>
        </div>
    @elseif(!session('cart') || count(session('cart')) == 0)
        <div class="container mx-auto px-4 py-8">
            <div class="card max-w-md mx-auto">
                <div class="card-content text-center py-8">
                    <svg class="w-16 h-16 mx-auto mb-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <p class="text-lg mb-4">Giỏ hàng của bạn đang trống.</p>
                    <a href="{{ route('welcome') }}" class="btn-primary">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto px-4 py-8 max-w-4xl">
            <h1 class="text-3xl font-bold mb-6">Giỏ hàng</h1>

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="lg:col-span-2 space-y-4">
                    @foreach(session('cart') as $id => $details)
                        <div class="card">
                            <div class="card-content p-6">
                                <div class="flex items-center gap-4">
                                    <div class="relative w-20 h-20 flex-shrink-0 bg-gray-100 rounded-md overflow-hidden">
                                        @if(isset($details['image']) && $details['image'])
                                            <img src="{{ asset('storage/' . $details['image']) }}" 
                                                 alt="{{ $details['name'] }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-semibold text-lg truncate">{{ $details['name'] }}</h3>
                                        <p class="text-primary font-bold">{{ number_format($details['price'], 0, ',', '.') }} đ</p>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <input type="hidden" name="quantity" value="{{ $details['quantity'] - 1 }}">
                                            <button type="submit" class="btn-outline p-2 {{ $details['quantity'] <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                                    {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                </svg>
                                            </button>
                                        </form>

                                        <div class="input w-16 text-center bg-gray-50">
                                            {{ $details['quantity'] }}
                                        </div>

                                        <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <input type="hidden" name="quantity" value="{{ $details['quantity'] + 1 }}">
                                            <button type="submit" class="btn-outline p-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="text-right">
                                        <p class="font-bold text-lg">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} đ</p>
                                        <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="submit" class="btn-outline text-red-500 hover:text-red-700 hover:bg-red-50 px-2 py-1 text-sm">
                                                <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="lg:col-span-1">
                    <div class="card sticky top-4">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold">Tóm tắt đơn hàng</h2>
                        </div>
                        <div class="card-content space-y-4">
                            <div class="space-y-2">
                                @php $total = 0 @endphp
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <div class="flex justify-between text-sm">
                                        <span>{{ $details['name'] }} x{{ $details['quantity'] }}</span>
                                        <span>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} đ</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="border-t pt-4">
                                <div class="flex justify-between font-bold text-lg">
                                    <span>Tổng cộng:</span>
                                    <span class="text-primary">{{ number_format($total, 0, ',', '.') }} đ</span>
                                </div>
                            </div>

                            <a href="{{ route('checkout.index') }}" class="btn-primary w-full text-lg py-3 block text-center">
                                Tiến hành thanh toán
                            </a>

                            <a href="{{ route('welcome') }}" class="btn-outline w-full block text-center py-2">
                                Tiếp tục mua sắm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

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

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="error-message">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-message').style.display = 'none';
            }, 3000);
        </script>
    @endif
</x-app-layout>