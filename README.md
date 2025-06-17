# 🛒 Hệ Thống Bán Hàng Laravel

Một ứng dụng web bán hàng trực tuyến được xây dựng bằng Laravel 12.x với đầy đủ tính năng quản lý sản phẩm, đơn hàng và người dùng.

## ✨ Tính Năng Chính

### 🏪 Cho Khách Hàng
- **Duyệt sản phẩm**: Xem danh sách sản phẩm theo danh mục
- **Chi tiết sản phẩm**: Xem thông tin chi tiết và đánh giá sản phẩm
- **Giỏ hàng**: Thêm, cập nhật, xóa sản phẩm trong giỏ hàng
- **Đặt hàng**: Tạo và theo dõi đơn hàng
- **Đánh giá**: Viết đánh giá cho sản phẩm đã mua
- **Quản lý tài khoản**: Cập nhật thông tin cá nhân

### 👨‍💼 Cho Admin
- **Dashboard**: Tổng quan thống kê bán hàng
- **Quản lý sản phẩm**: CRUD sản phẩm và danh mục
- **Quản lý đơn hàng**: Xem và cập nhật trạng thái đơn hàng
- **Quản lý người dùng**: Xem danh sách khách hàng

## 🛠️ Công Nghệ Sử Dụng

- **Framework**: Laravel 12.x
- **PHP**: ^8.2
- **Authentication**: Laravel Breeze
- **Database**: MySQL
- **Frontend**: Blade Templates + CSS + JavaScript
- **Build Tool**: Vite
- **Testing**: Pest PHP

## 📋 Yêu Cầu Hệ Thống

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Apache/Nginx

## 🚀 Cài Đặt

### 1. Clone repository
```bash
git clone <repository-url>
cd lavavel_project
```

### 2. Cài đặt dependencies
```bash
# Cài đặt PHP dependencies
composer install

# Cài đặt Node.js dependencies
npm install
```

### 3. Cấu hình môi trường
```bash
# Copy file cấu hình
cp .env.example .env

# Tạo application key
php artisan key:generate
```

### 4. Cấu hình database
Chỉnh sửa file `.env` với thông tin database của bạn:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Chạy migrations và seeders
```bash
# Tạo database tables
php artisan migrate

# Chạy seeders để tạo dữ liệu mẫu
php artisan db:seed
```

### 6. Khởi động ứng dụng
```bash
# Khởi động Laravel server
php artisan serve

# Trong terminal khác, build assets
npm run dev
```

Truy cập ứng dụng tại: `http://localhost:8000`

## 📁 Cấu Trúc Dự Án

```
lavavel_project/
├── app/
│   ├── Http/Controllers/
│   │   ├── CartController.php
│   │   ├── CategoryController.php
│   │   ├── DashboardController.php
│   │   ├── OrderController.php
│   │   ├── ProductController.php
│   │   ├── ReviewController.php
│   │   └── Auth/
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Category.php
│       ├── Order.php
│       ├── OrderItem.php
│       └── Review.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── products/
│   │   ├── cart/
│   │   ├── orders/
│   │   ├── dashboard/
│   │   └── auth/
│   ├── css/
│   └── js/
└── routes/
    └── web.php
```

## 🗄️ Database Schema

### Bảng chính:
- **users**: Thông tin người dùng
- **categories**: Danh mục sản phẩm
- **products**: Sản phẩm
- **orders**: Đơn hàng
- **order_items**: Chi tiết đơn hàng
- **reviews**: Đánh giá sản phẩm

## 🔗 Routes Chính

```php
// Trang chủ - danh sách sản phẩm
GET /

// Sản phẩm
GET /products
GET /products/{id}

// Giỏ hàng (yêu cầu đăng nhập)
GET /cart
POST /cart/add/{product}
PUT /cart/update/{product}
DELETE /cart/remove/{product}

// Đơn hàng (yêu cầu đăng nhập)
GET /orders
POST /orders
GET /orders/{id}

// Admin dashboard (yêu cầu đăng nhập)
GET /admin/dashboard
```

## 🧪 Testing

```bash
# Chạy tests
composer test

# Hoặc sử dụng Pest
./vendor/bin/pest
```

## 🎯 Tính Năng Sắp Tới

- [ ] Thanh toán trực tuyến
- [ ] Thông báo email
- [ ] Tìm kiếm nâng cao
- [ ] Wishlist
- [ ] Coupon/Discount
- [ ] Multi-language support
- [ ] API REST

## 📖 Tài Liệu

### Artisan Commands
```bash
# Tạo controller
php artisan make:controller ProductController

# Tạo model với migration
php artisan make:model Product -m

# Tạo seeder
php artisan make:seeder ProductSeeder

# Chạy queue jobs
php artisan queue:work
```

### Development Mode
```bash
# Chạy tất cả services development
composer dev
```

## 🤝 Đóng Góp

1. Fork dự án
2. Tạo feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Tạo Pull Request

## 📞 Liên Hệ

- Email: your-email@example.com
- GitHub: [your-github-username]

## 📄 License

Dự án này được phân phối dưới MIT License. Xem file `LICENSE` để biết thêm chi tiết.

---

⭐ Nếu dự án này hữu ích cho bạn, hãy cho một star nhé!
