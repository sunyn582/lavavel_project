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
        // Đồ điện tử (category_id: 1)
        Product::create([
            'name' => 'iPhone 15 Pro',
            'description' => 'Điện thoại thông minh cao cấp với chip A17 Pro, camera 48MP và thiết kế titanium sang trọng',
            'price' => 25000000,
            'stock' => 15,
            'category_id' => 1,
            'rating' => 4.8,
            'image' => 'products/Apple-iPhone-15-Pro.png'
        ]);

        Product::create([
            'name' => 'Máy xay sinh tố',
            'description' => 'Máy xay sinh tố đa năng công suất cao, blade inox sắc bén, dễ dàng xay các loại trái cây',
            'price' => 1500000,
            'stock' => 0, // Hết hàng
            'category_id' => 1,
            'rating' => 4.5,
            'image' => 'products/may-xay-sinh-to.png'
        ]);

        Product::create([
            'name' => 'Tai nghe Bluetooth',
            'description' => 'Tai nghe không dây chất lượng cao, chống ồn chủ động, thời lượng pin lâu',
            'price' => 2000000,
            'stock' => 5, // Ít hàng
            'category_id' => 1,
            'rating' => 4.6,
            'image' => 'products/tai-nghe-bluetooth.png'
        ]);

        Product::create([
            'name' => 'MacBook Air M2',
            'description' => 'Laptop siêu mỏng với chip M2, màn hình Liquid Retina 13.6 inch, pin cả ngày',
            'price' => 32000000,
            'stock' => 25,
            'category_id' => 1,
            'rating' => 4.9,
            'image' => 'products/macbook-air-m2.png'
        ]);

        Product::create([
            'name' => 'Samsung Galaxy S24',
            'description' => 'Smartphone flagship với AI tích hợp, camera 200MP, sạc nhanh 45W',
            'price' => 22000000,
            'stock' => 0, // Hết hàng
            'category_id' => 1,
            'rating' => 4.7,
            'image' => 'products/samsung_galaxy_s24_ultra.jpg'
        ]);

        // Đồ làm đẹp (category_id: 2)
        Product::create([
            'name' => 'Son môi Dior',
            'description' => 'Son môi cao cấp lâu trôi, màu sắc rực rỡ, dưỡng ẩm tự nhiên',
            'price' => 800000,
            'stock' => 8, // Ít hàng
            'category_id' => 2,
            'rating' => 4.7,
            'image' => 'products/son-moi-dior.png'
        ]);

        Product::create([
            'name' => 'Kem dưỡng da',
            'description' => 'Kem dưỡng da chống lão hóa với thành phần tự nhiên, phù hợp mọi loại da',
            'price' => 450000,
            'stock' => 35,
            'category_id' => 2,
            'rating' => 4.4,
            'image' => 'products/son-duong-dior.png'
        ]);

        Product::create([
            'name' => 'Serum Vitamin C',
            'description' => 'Serum Vitamin C 20% giúp làm sáng da, mờ thâm nám hiệu quả',
            'price' => 650000,
            'stock' => 0, // Hết hàng
            'category_id' => 2,
            'rating' => 4.6,
            'image' => 'products/Serum-Vitamin-C.png'
        ]);

        Product::create([
            'name' => 'Sữa rửa mặt',
            'description' => 'Sữa rửa mặt tạo bọt mịn, làm sạch sâu lỗ chân lông, không gây khô da',
            'price' => 280000,
            'stock' => 50,
            'category_id' => 2,
            'rating' => 4.3,
            'image' => 'products/Sữa-rửa-măt.png'
        ]);

        // Quần áo (category_id: 3)
        Product::create([
            'name' => 'Áo sơ mi nam',
            'description' => 'Áo sơ mi công sở cao cấp, vải cotton 100%, form dáng thanh lịch',
            'price' => 350000,
            'stock' => 20,
            'category_id' => 3,
            'rating' => 4.3,
            'image' => 'products/ao-so-mi-nam.png'
        ]);

        Product::create([
            'name' => 'Váy đầm nữ',
            'description' => 'Váy đầm thanh lịch dành cho phụ nữ, thiết kế hiện đại, phù hợp đi làm',
            'price' => 450000,
            'stock' => 3, // Ít hàng
            'category_id' => 3,
            'rating' => 4.5,
            'image' => 'products/Váy_đầm_nữ.png'
        ]);

        Product::create([
            'name' => 'Quần jeans nam',
            'description' => 'Quần jeans nam phong cách, co giãn nhẹ, bền đẹp theo thời gian',
            'price' => 420000,
            'stock' => 0, // Hết hàng
            'category_id' => 3,
            'rating' => 4.4,
            'image' => 'products/Quần_jeans_nam.png'
        ]);

        Product::create([
            'name' => 'Áo khoác hoodie',
            'description' => 'Áo khoác hoodie unisex, chất liệu cotton mềm mại, phù hợp mọi mùa',
            'price' => 380000,
            'stock' => 12,
            'category_id' => 3,
            'rating' => 4.6,
            'image' => 'products/áo-khoác-hoodie.png'
        ]);
    }
}
