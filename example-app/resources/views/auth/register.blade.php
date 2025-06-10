@extends('layouts.app')
@section('title', 'Đăng ký')
@section('content')
    <h1>Đăng ký</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input name="name" type="text" placeholder="Họ tên" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Mật khẩu" required>
        <input name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu" required>
        <button type="submit">Đăng ký</button>
    </form>
@endsection