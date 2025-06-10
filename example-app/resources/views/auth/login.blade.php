@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('content')
    <h1>Đăng nhập</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input name="email" type="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
    </form>
@endsection