# Laravel Online Store

![Laravel Online Store Banner](public/images/products/Apple-iPhone-15-Pro.png)

## 🛒 Giới thiệu

**Laravel Online Store** là một hệ thống thương mại điện tử hoàn chỉnh, xây dựng bằng Laravel, hỗ trợ quản lý sản phẩm, danh mục, giỏ hàng, đặt hàng, đánh giá, phân quyền người dùng, giao diện hiện đại và dễ mở rộng cho nhiều mục đích kinh doanh.

---

## 🌟 Danh sách tính năng chi tiết

### 1. Quản lý sản phẩm
- Thêm, sửa, xóa sản phẩm với các trường: tên, mô tả, giá, tồn kho, hình ảnh, đánh giá, danh mục.
- Hỗ trợ upload ảnh sản phẩm, lưu trữ ảnh trong thư mục `public/images/products`.
- Hiển thị danh sách sản phẩm với phân trang, tìm kiếm, lọc theo danh mục.
- Xem chi tiết sản phẩm, hiển thị thông tin, đánh giá, tồn kho.

### 2. Quản lý danh mục
- Thêm, sửa, xóa danh mục sản phẩm.
- Gán sản phẩm vào danh mục, lọc sản phẩm theo danh mục.
- Hỗ trợ slug cho SEO.

### 3. Giỏ hàng & đặt hàng
- Thêm sản phẩm vào giỏ hàng, cập nhật số lượng, xóa khỏi giỏ.
- Đặt hàng, lưu thông tin đơn hàng và chi tiết từng sản phẩm.
- Quản lý đơn hàng cho cả user và admin.

### 4. Đánh giá sản phẩm
- Người dùng có thể đánh giá, nhận xét sản phẩm đã mua.
- Hiển thị điểm đánh giá trung bình trên từng sản phẩm.

### 5. Quản trị viên (Admin)
- Đăng nhập với quyền admin để quản lý toàn bộ sản phẩm, danh mục, đơn hàng, người dùng.
- Giao diện quản trị riêng biệt, bảo vệ bằng middleware.

### 6. Người dùng
- Đăng ký, đăng nhập, cập nhật thông tin cá nhân.
- Xem lịch sử đơn hàng, trạng thái đơn hàng.
- Đổi mật khẩu, quên mật khẩu qua email.

### 7. Giao diện & trải nghiệm
- Responsive, tối ưu cho mọi thiết bị với TailwindCSS.
- Navbar, phân trang, thông báo, xác nhận thao tác.
- Trang đăng nhập, đăng ký, quản lý tài khoản, giỏ hàng, checkout, dashboard admin.

### 8. Seed dữ liệu mẫu
- Tích hợp sẵn các seeder cho sản phẩm, danh mục, người dùng để thử nghiệm nhanh.

### 9. Bảo mật & hiệu năng
- Xác thực CSRF, phân quyền route, validate dữ liệu đầu vào.
- Sử dụng cache cho danh mục và sản phẩm để tăng tốc độ tải trang.

---

## 🗂️ Sơ đồ cấu trúc dự án

```
laravel_online_store/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ProductController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── CartController.php
│   │   │   ├── OrderController.php
│   │   │   └── ...
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Product.php
│   │   ├── Category.php
│   │   ├── Order.php
│   │   └── ...
│   └── ...
├── resources/
│   ├── views/
│   │   ├── products/
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   │   └── ...
│   │   ├── admin/
│   │   │   └── products/
│   │   ├── components/
│   │   └── ...
│   ├── css/
│   └── js/
├── public/
│   └── images/
│       └── products/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── routes/
│   ├── web.php
│   └── auth.php
├── config/
├── package.json
├── composer.json
└── README.md
```

---

## ⚡ Hướng dẫn cài đặt & sử dụng

### 1. Clone dự án

```bash
git clone https://github.com/your-username/laravel-online-store.git
cd laravel-online-store
```

### 2. Cài đặt Composer & NPM

```bash
composer install
npm install
```

### 3. Tạo file môi trường

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Cấu hình database trong `.env` rồi chạy migrate & seed

```bash
php artisan migrate --seed
```

### 5. Build frontend

```bash
npm run build
```

### 6. Khởi động server

```bash
php artisan serve
```

Truy cập: [http://localhost:8000](http://localhost:8000)

---

## 👤 Tài khoản mẫu

- **Admin:**  
  Email: test@example.com  
  Password: password

---

## 💡 Đóng góp

Mọi đóng góp, issue hoặc pull request đều được hoan nghênh!  
Vui lòng tạo issue hoặc PR trên GitHub để cùng phát triển dự án.

---

## 📄 License

MIT License

---

## 📢 Hiển thị README trên trang chính GitHub

Chỉ cần đặt file `README.md` ở thư mục gốc repo, GitHub sẽ tự động hiển thị nội dung này trên trang chính của dự án.

---
