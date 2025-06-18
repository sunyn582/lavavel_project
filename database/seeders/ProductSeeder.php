<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'iPhone 15 Pro',
            'description' => 'Điện thoại thông minh cao cấp từ Apple',
            'price' => 29990000,
            'stock' => 50,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S24',
            'description' => 'Điện thoại Android flagship của Samsung',
            'price' => 22990000,
            'stock' => 30,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'MacBook Pro M3',
            'description' => 'Laptop cao cấp cho chuyên gia',
            'price' => 59990000,
            'stock' => 20,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Dell XPS 13',
            'description' => 'Laptop Windows mỏng nhẹ',
            'price' => 32990000,
            'stock' => 25,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'AirPods Pro',
            'description' => 'Tai nghe không dây chống ồn',
            'price' => 6990000,
            'stock' => 100,
            'category_id' => 3
        ]);
    }
}
