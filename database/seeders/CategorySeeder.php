<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Đồ điện tử',
            'slug' => 'electronics',
            'description' => 'Các sản phẩm công nghệ và gia dụng điện tử'
        ]);

        Category::create([
            'name' => 'Đồ làm đẹp',
            'slug' => 'beauty',
            'description' => 'Sản phẩm làm đẹp và chăm sóc cá nhân'
        ]);

        Category::create([
            'name' => 'Quần áo',
            'slug' => 'clothing',
            'description' => 'Thời trang nam và nữ'
        ]);

        Category::create([
            'name' => 'Đồ khác',
            'slug' => 'others',
            'description' => 'Các sản phẩm khác'
        ]);
    }
}
