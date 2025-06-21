<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Đặt hàng thành công!</h1>
            <p class="text-gray-600">Cảm ơn bạn đã mua sắm tại ShopOnline</p>
        </div>

        <div class="card mb-6">
            <div class="card-header">
                <h2 class="text-xl font-semibold">Thông tin đơn hàng</h2>
            </div>
            <div class="card-content space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Mã đơn hàng</p>
                        <p class="font-bold text-lg">#{{ $order->id }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Ngày đặt</p>
                        <p class="font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Trạng thái thanh toán</p>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $order->payment_status === 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                        </span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phương thức thanh toán</p>
                        <p class="font-medium">
                            {{ $order->payment_method === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}
                        </p>
                    </div>
                </div>

                <div class="border-t pt-4">
                    <p class="text-sm text-gray-600 mb-2">Địa chỉ giao hàng</p>
                    <p class="font-medium">{{ $order->user->name }}</p>
                    <p class="text-gray-700">{{ $order->phone }}</p>
                    <p class="text-gray-700">{{ $order->shipping_address }}</p>
                </div>

                @if($order->notes)
                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600 mb-2">Ghi chú</p>
                        <p class="text-gray-700">{{ $order->notes }}</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mb-6">
            <div class="card-header">
                <h2 class="text-xl font-semibold">Chi tiết sản phẩm</h2>
            </div>
            <div class="card-content">
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex items-center gap-4 py-3 border-b last:border-b-0">
                            <div class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center">
                                @if($item->product && $item->product->image)
                                    <img src="{{ filter_var($item->product->image, FILTER_VALIDATE_URL) ? $item->product->image : asset('storage/' . $item->product->image) }}" 
                                         alt="{{ $item->product->name }}" 
                                         class="w-full h-full object-cover rounded-md">
                                @else
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium">{{ $item->product ? $item->product->name : 'Sản phẩm không tồn tại' }}</h3>
                                <p class="text-sm text-gray-600">
                                    {{ number_format($item->price, 0, ',', '.') }} VNĐ × {{ $item->quantity }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold">{{ number_format($item->total, 0, ',', '.') }} VNĐ</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between font-bold text-lg">
                        <span>Tổng cộng:</span>
                        <span class="text-red-600">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span>
                    </div>
                </div>
            </div>
        </div>

        @if($order->payment_method === 'bank_transfer' && $order->payment_status === 'pending')
            <div class="card mb-6 border-blue-200 bg-blue-50">
                <div class="card-content">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-blue-900 mb-2">Thông tin chuyển khoản</h3>
                            <div class="text-sm text-blue-800 space-y-1">
                                <p><strong>Ngân hàng:</strong> Vietcombank</p>
                                <p><strong>Số tài khoản:</strong> 1234567890</p>
                                <p><strong>Chủ tài khoản:</strong> SHOPONLINE COMPANY</p>
                                <p><strong>Số tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</p>
                                <p><strong>Nội dung:</strong> Thanh toan don hang #{{ $order->id }}</p>
                            </div>
                            <p class="text-xs text-blue-600 mt-2">
                                Vui lòng chuyển khoản và liên hệ với chúng tôi để xác nhận thanh toán.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="text-center space-y-3">
            <a href="{{ route('welcome') }}" class="btn-primary inline-block px-8 py-3">
                Tiếp tục mua sắm
            </a>
            <div>
                <a href="{{ route('orders.show', $order->id) }}" class="btn-outline inline-block px-6 py-2">
                    Xem chi tiết đơn hàng
                </a>
            </div>
        </div>
    </div>
</x-app-layout>