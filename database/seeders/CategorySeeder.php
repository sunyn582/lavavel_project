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
            'name' => 'Điện thoại',
            'description' => 'Các sản phẩm điện thoại thông minh'
        ]);

        Category::create([
            'name' => 'Laptop',
            'description' => 'Máy tính xách tay và phụ kiện'
        ]);

        Category::create([
            'name' => 'Phụ kiện',
            'description' => 'Phụ kiện điện tử và công nghệ'
        ]);
    }
}
