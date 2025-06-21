<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900">Tạo tài khoản</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Hoặc 
                        <a href="{{ route('login') }}" class="font-medium text-primary hover:text-primary/80">
                            đăng nhập nếu đã có tài khoản
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-content p-8">
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Họ và tên
                            </label>
                            <input id="name" 
                                   name="name" 
                                   type="text" 
                                   required 
                                   autofocus 
                                   autocomplete="name"
                                   class="input {{ $errors->has('name') ? 'border-red-500' : '' }}"
                                   value="{{ old('name') }}"
                                   placeholder="Nhập họ và tên">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input id="email" 
                                   name="email" 
                                   type="email" 
                                   required 
                                   autocomplete="username"
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
                            <div class="relative">
                                <input id="password"
                                       name="password"
                                       type="password"
                                       required
                                       minlength="8"
                                       autocomplete="new-password"
                                       class="input {{ $errors->has('password') ? 'border-red-500' : '' }} pr-10"
                                       placeholder="Nhập mật khẩu (tối thiểu 8 ký tự)">
                                <button type="button"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                        onclick="togglePassword('password')">
                                    <svg id="password-eye" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Mật khẩu phải có ít nhất 8 ký tự</p>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Xác nhận mật khẩu
                            </label>
                            <input id="password_confirmation" 
                                   name="password_confirmation" 
                                   type="password" 
                                   required 
                                   autocomplete="new-password"
                                   class="input {{ $errors->has('password_confirmation') ? 'border-red-500' : '' }}"
                                   placeholder="Nhập lại mật khẩu">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div>
                            <button type="submit" class="btn-primary w-full py-3 text-lg">
                                Tạo tài khoản
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const eye = document.getElementById(fieldId + '-eye');
        
        if (field.type === 'password') {
            field.type = 'text';
            eye.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
            `;
        } else {
            field.type = 'password';
            eye.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
        }
    }

    // Password strength indicator
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strength = document.getElementById('password-strength');
        
        let score = 0;
        if (password.length >= 8) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/[0-9]/.test(password)) score++;
        if (/[^A-Za-z0-9]/.test(password)) score++;
        
        if (strength) {
            const levels = ['Rất yếu', 'Yếu', 'Trung bình', 'Mạnh', 'Rất mạnh'];
            const colors = ['red', 'orange', 'yellow', 'green', 'green'];
            strength.textContent = password.length > 0 ? levels[score] || levels[0] : '';
            strength.style.color = password.length > 0 ? colors[score] || colors[0] : '';
        }
    });

    // Form validation feedback
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const passwordConfirm = document.getElementById('password_confirmation');
        const password = document.getElementById('password');
        
        passwordConfirm.addEventListener('input', function() {
            if (this.value && this.value !== password.value) {
                this.setCustomValidity('Mật khẩu xác nhận không khớp');
                this.classList.add('border-red-500');
            } else {
                this.setCustomValidity('');
                this.classList.remove('border-red-500');
            }
        });
        
        // Show success message after registration
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif
    });
    </script>
</x-guest-layout>