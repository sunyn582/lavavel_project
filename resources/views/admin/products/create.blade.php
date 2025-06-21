<x-admin-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Thêm sản phẩm mới</h1>
                <p class="mt-1 text-sm text-gray-600">Điền thông tin chi tiết về sản phẩm</p>
            </div>
            <a href="{{ route('admin.products') }}" class="btn-outline">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Quay lại
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow sm:rounded-lg">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Tên sản phẩm *
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               required
                               class="input {{ $errors->has('name') ? 'border-red-500' : '' }}" 
                               placeholder="Nhập tên sản phẩm">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Danh mục *
                        </label>
                        <select id="category_id" 
                                name="category_id" 
                                required
                                class="input {{ $errors->has('category_id') ? 'border-red-500' : '' }}">
                            <option value="">Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Giá (VNĐ) *
                        </label>
                        <input type="number" 
                               id="price" 
                               name="price" 
                               value="{{ old('price') }}"
                               required
                               min="0"
                               step="1000"
                               class="input {{ $errors->has('price') ? 'border-red-500' : '' }}" 
                               placeholder="Nhập giá sản phẩm">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                            Số lượng tồn kho *
                        </label>
                        <input type="number" 
                               id="stock" 
                               name="stock" 
                               value="{{ old('stock') }}"
                               required
                               min="0"
                               class="input {{ $errors->has('stock') ? 'border-red-500' : '' }}" 
                               placeholder="Nhập số lượng">
                        @error('stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">
                            Đánh giá (0-5)
                        </label>
                        <input type="number" 
                               id="rating" 
                               name="rating" 
                               value="{{ old('rating') }}"
                               min="0"
                               max="5"
                               step="0.1"
                               class="input {{ $errors->has('rating') ? 'border-red-500' : '' }}" 
                               placeholder="Nhập điểm đánh giá">
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Hình ảnh sản phẩm
                        </label>
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               class="input {{ $errors->has('image') ? 'border-red-500' : '' }}">
                        <p class="text-sm text-gray-500 mt-1">Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Mô tả sản phẩm *
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              required
                              class="input {{ $errors->has('description') ? 'border-red-500' : '' }}" 
                              placeholder="Nhập mô tả chi tiết về sản phẩm">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.products') }}" class="btn-outline">
                        Hủy bỏ
                    </a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Thêm sản phẩm
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>