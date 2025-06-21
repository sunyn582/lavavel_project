<x-admin-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Chỉnh sửa người dùng</h1>
                <p class="mt-1 text-sm text-gray-600">Cập nhật thông tin người dùng: {{ $user->name }}</p>
            </div>
            <a href="{{ route('admin.users') }}" class="btn-outline">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Quay lại
            </a>
        </div>

        <!-- User Info Card -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Thông tin cơ bản</h3>
                
                <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Họ và tên *
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}"
                                   required
                                   class="input {{ $errors->has('name') ? 'border-red-500' : '' }}" 
                                   placeholder="Nhập họ và tên">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email *
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}"
                                   required
                                   class="input {{ $errors->has('email') ? 'border-red-500' : '' }}" 
                                   placeholder="Nhập email">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-md font-medium text-gray-900 mb-4">Thông tin bổ sung</h4>
                        
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">ID người dùng</label>
                                <div class="mt-1 text-sm text-gray-900 bg-gray-50 px-3 py-2 rounded-md">{{ $user->id }}</div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Ngày đăng ký</label>
                                <div class="mt-1 text-sm text-gray-900 bg-gray-50 px-3 py-2 rounded-md">{{ $user->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Trạng thái email</label>
                                <div class="mt-1">
                                    @if($user->email_verified_at)
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            ✓ Đã xác thực ({{ $user->email_verified_at->format('d/m/Y') }})
                                        </span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                            ✗ Chưa xác thực
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Role</label>
                                <div class="mt-1">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $user->role === 'admin' ? 'Quản trị viên' : 'Người dùng' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.users') }}" class="btn-outline">
                            Hủy bỏ
                        </a>
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Cập nhật thông tin
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Warning -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L5.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Lưu ý</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>Chỉ có thể chỉnh sửa thông tin cơ bản của người dùng. Không thể thay đổi mật khẩu từ trang này.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>