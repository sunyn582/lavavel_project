<x-app-layout>
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <h1 class="text-2xl font-bold mb-6">Đơn hàng của tôi</h1>
        @if($orders->isEmpty())
            <div class="text-center text-gray-500 py-12">
                Bạn chưa có đơn hàng nào.
            </div>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="card p-6">
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span class="font-semibold">Đơn #{{ $order->id }}</span>
                                <span class="ml-2 text-sm text-gray-500">({{ $order->created_at->format('d/m/Y H:i') }})</span>
                            </div>
                            <div>
                                <span class="px-2 py-1 rounded text-xs
                                    @if($order->order_status === 'processing') bg-yellow-100 text-yellow-800
                                    @elseif($order->order_status === 'shipped') bg-blue-100 text-blue-800
                                    @elseif($order->order_status === 'delivered') bg-green-100 text-green-800
                                    @elseif($order->order_status === 'cancelled') bg-red-100 text-red-800
                                    @endif">
                                    {{ __($order->order_status) }}
                                </span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray-600 text-sm">Thời gian giao dự kiến: </span>
                            <span class="font-medium">{{ $order->created_at->addDays(3)->format('d/m/Y') }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray-600 text-sm">Tổng tiền: </span>
                            <span class="font-bold text-red-600">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray-600 text-sm">Địa chỉ giao hàng: </span>
                            <span>{{ $order->shipping_address }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray-600 text-sm">Số điện thoại: </span>
                            <span>{{ $order->phone }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-gray-600 text-sm">Phương thức thanh toán: </span>
                            <span>
                                {{ $order->payment_method === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}
                            </span>
                        </div>
                        <div class="mb-4">
                            <span class="text-gray-600 text-sm">Sản phẩm:</span>
                            <ul class="list-disc ml-6">
                                @foreach($order->orderItems as $item)
                                    <li>
                                        {{ $item->product->name ?? 'Sản phẩm không tồn tại' }} - SL: {{ $item->quantity }}
                                        <span class="text-gray-500 text-xs">({{ number_format($item->price, 0, ',', '.') }} VNĐ)</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn-outline px-4 py-2">Xem chi tiết</a>
                            @if(in_array($order->order_status, ['processing', 'shipped']))
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này không?');">
                                    @csrf
                                    <button type="submit" class="btn-outline text-red-500 hover:text-red-700 px-4 py-2">Huỷ đơn</button>
                                </form>
                            @elseif($order->order_status === 'cancelled')
                                <span class="text-red-600 ml-2">(Đã huỷ)</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>