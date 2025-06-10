<nav>
    <a href="{{ route('products.index') }}">Sản phẩm</a> |
    <a href="{{ route('cart.index') }}">Giỏ hàng</a> |
    @auth
        <a href="{{ route('orders.index') }}">Đơn hàng</a> |
        <a href="{{ route('dashboard.admin') }}">Dashboard</a> |
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:none;border:none;color:blue;cursor:pointer;">Đăng xuất</button>
        </form>
    @else
        <a href="{{ route('login') }}">Đăng nhập</a> |
        <a href="{{ route('register') }}">Đăng ký</a>
    @endauth
</nav>