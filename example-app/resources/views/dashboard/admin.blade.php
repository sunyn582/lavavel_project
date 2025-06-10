@extends('layouts.app')
@section('title', 'Dashboard Quản trị')
@section('content')
    <h1>Dashboard Quản trị</h1>
    <ul>
        <li>Tổng số sản phẩm: {{ $totalProducts }}</li>
        <li>Tổng số đơn hàng: {{ $totalOrders }}</li>
        <li>Tổng doanh thu: {{ number_format($totalRevenue) }} VNĐ</li>
        <li>Tổng số khách hàng: {{ $totalUsers }}</li>
    </ul>
@endsection