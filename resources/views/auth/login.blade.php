<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900">Đăng nhập</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Hoặc 
                        <a href="{{ route('register') }}" class="font-medium text-primary hover:text-primary/80">
                            tạo tài khoản mới
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-content p-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input id="email" 
                                   name="email" 
                                   type="email" 
                                   required 
                                   class="input {{ $errors->has('email') ? 'border-red-500' : '' }}"
                                   value="{{ old('email') }}"
                                   placeholder="Nhập email của bạn">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Mật khẩu
                            </label>
                            <input id="password" 
                                   name="password" 
                                   type="password" 
                                   required 
                                   class="input {{ $errors->has('password') ? 'border-red-500' : '' }}"
                                   placeholder="Nhập mật khẩu">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" 
                                       name="remember" 
                                       type="checkbox" 
                                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-primary hover:text-primary/80">
                                        Quên mật khẩu?
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="btn-primary w-full py-3 text-lg">
                                Đăng nhập
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>