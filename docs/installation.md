---
layout: default
title: Hướng Dẫn Cài Đặt
---

# 🚀 Hướng Dẫn Cài Đặt

## 📋 Yêu Cầu Hệ Thống

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Apache/Nginx

## 🛠️ Các Bước Cài Đặt

### 1. Clone repository
```bash
git clone https://github.com/your-username/lavavel_project.git
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

## 🔧 Cấu Hình Nâng Cao

### Database Optimization
```bash
# Tối ưu hóa database
php artisan optimize

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Production Setup
```bash
# Build assets cho production
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🧪 Testing

```bash
# Chạy tests
composer test

# Hoặc sử dụng Pest
./vendor/bin/pest
```

## ❌ Troubleshooting

### Lỗi thường gặp:

1. **Permission denied**: 
   ```bash
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```

2. **Key not set**: 
   ```bash
   php artisan key:generate
   ```

3. **Database connection**: Kiểm tra lại thông tin trong file `.env`

[← Quay lại trang chủ](../)