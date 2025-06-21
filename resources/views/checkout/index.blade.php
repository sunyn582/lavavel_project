<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h1 class="text-3xl font-bold mb-6">Thanh toán</h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid gap-6 lg:grid-cols-3">
                <div class="lg:col-span-2 space-y-6">
                    <!-- Shipping Address -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Thông tin giao hàng
                            </h2>
                        </div>
                        <div class="card-content space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Họ và tên</label>
                                    <input id="name" value="{{ Auth::user()->name }}" disabled class="input bg-gray-50" />
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại *</label>
                                    <input type="tel" 
                                           id="phone" 
                                           name="phone" 
                                           required
                                           value="{{ old('phone') }}" 
                                           class="input {{ $errors->has('phone') ? 'border-red-500' : '' }}" 
                                           placeholder="Nhập số điện thoại">
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ giao hàng *</label>
                                <textarea id="shipping_address" 
                                          name="shipping_address" 
                                          required
                                          rows="3"
                                          class="input {{ $errors->has('shipping_address') ? 'border-red-500' : '' }}" 
                                          placeholder="Nhập địa chỉ chi tiết để giao hàng">{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Ghi chú (tùy chọn)</label>
                                <textarea id="notes" 
                                          name="notes" 
                                          rows="2"
                                          class="input" 
                                          placeholder="Ghi chú thêm cho đơn hàng">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Phương thức thanh toán
                            </h2>
                        </div>
                        <div class="card-content space-y-4">
                            <div class="space-y-3">
                                <label class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" 
                                           name="payment_method" 
                                           value="cod" 
                                           {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}
                                           class="h-4 w-4 text-black focus:ring-black border-gray-300">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m-4-5v9M3 4l4 4 4-4m0 0l4 4 4-4"></path>
                                            </svg>
                                            <span class="font-medium">Thanh toán khi nhận hàng (COD)</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">Thanh toán bằng tiền mặt khi nhận hàng</p>
                                    </div>
                                </label>

                                <label class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" 
                                           name="payment_method" 
                                           value="bank_transfer" 
                                           {{ old('payment_method') === 'bank_transfer' ? 'checked' : '' }}
                                           class="h-4 w-4 text-black focus:ring-black border-gray-300">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                            </svg>
                                            <span class="font-medium">Chuyển khoản ngân hàng</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">Chuyển khoản qua ngân hàng (thanh toán trước)</p>
                                    </div>
                                </label>
                            </div>
                            @error('payment_method')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="card sticky top-4">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold">Đơn hàng của bạn</h2>
                        </div>
                        <div class="card-content space-y-4">
                            <div class="space-y-3">
                                @foreach($cart as $id => $item)
                                    <div class="flex justify-between text-sm">
                                        <div>
                                            <p class="font-medium">{{ $item['name'] }}</p>
                                            <p class="text-gray-600">Số lượng: {{ $item['quantity'] }}</p>
                                        </div>
                                        <span class="font-medium">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="border-t pt-4 space-y-2">
                                <div class="flex justify-between">
                                    <span>Tạm tính:</span>
                                    <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Phí vận chuyển:</span>
                                    <span class="text-green-600">Miễn phí</span>
                                </div>
                            </div>

                            <div class="border-t pt-4">
                                <div class="flex justify-between font-bold text-lg">
                                    <span>Tổng cộng:</span>
                                    <span class="text-red-600">{{ number_format($total, 0, ',', '.') }} VNĐ</span>
                                </div>
                            </div>

                            <button type="submit" class="btn-primary w-full text-lg py-3">
                                Đặt hàng
                            </button>

                            <a href="{{ route('cart.index') }}" class="btn-outline w-full block text-center py-2">
                                Quay lại giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="success-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 5000);
        </script>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="error-message">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-message').style.display = 'none';
            }, 5000);
        </script>
    @endif
</x-app-layout>