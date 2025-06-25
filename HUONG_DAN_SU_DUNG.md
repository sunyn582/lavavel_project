# 🛒 HƯỚNG DẪN SỬ DỤNG WEBSITE SHOPONLINE

## 📋 THÔNG TIN TỔNG QUAN

Website ShopOnline là một cửa hàng trực tuyến đầy đủ tính năng với:
- ✅ Giao diện hiện đại responsive (4 sản phẩm/hàng trên desktop)
- ✅ Hệ thống đăng ký/đăng nhập với bảo mật
- ✅ Quản lý tồn kho thông minh
- ✅ Giỏ hàng và thanh toán
- ✅ Hiệu suất tối ưu với cache

## 🔐 TÀI KHOẢN DEMO CÓ SẴN

### 👨‍💼 Tài khoản Admin:
- **Email**: admin@shoponline.com
- **Mật khẩu**: password123

### 👤 Tài khoản User:
- **Email**: user@example.com
- **Mật khẩu**: password123

### 👤 Tài khoản User 2:
- **Email**: user2@example.com
- **Mật khẩu**: password123

## 👨‍💼 TÍNH NĂNG ADMIN

### 🔐 Truy cập Admin Panel:
- Đăng nhập bằng tài khoản admin (admin@shoponline.com / password123)
- Tên hiển thị sẽ có badge "Admin" màu đỏ
- Click dropdown user → "Quản trị Admin" để vào admin panel
- Hoặc truy cập trực tiếp: `http://localhost:8000/admin/dashboard`

### 📊 Dashboard Admin:
- **Thống kê tổng quan**: Số sản phẩm, người dùng, đơn hàng, doanh thu
- **Đơn hàng gần đây**: 5 đơn hàng mới nhất với thông tin chi tiết
- **Thao tác nhanh**: Link nhanh đến các chức năng chính

### 📦 Quản lý Sản phẩm:
- **Xem danh sách**: Bảng sản phẩm với hình ảnh, giá, tồn kho, đánh giá
- **Thêm sản phẩm**: Form đầy đủ với upload hình ảnh
- **Sửa sản phẩm**: Cập nhật thông tin, thay đổi hình ảnh
- **Xóa sản phẩm**: Xóa vĩnh viễn (có xác nhận)
- **Tự động xử lý**: Upload/xóa hình ảnh tự động

### 👥 Quản lý Người dùng:
- **Danh sách user**: Chỉ hiển thị user thường (không bao gồm admin)
- **Sửa thông tin**: Cập nhật tên, email người dùng
- **Xóa user**: Xóa vĩnh viễn tài khoản (không thể hoàn tác)
- **Bảo vệ admin**: Không thể sửa/xóa tài khoản admin
- **Thông tin chi tiết**: Trạng thái email, ngày đăng ký, role

##  CÁCH SỬ DỤNG

### 1. **Truy cập website**
- Mở trình duyệt và vào: `http://localhost:8000`
- Giao diện sẽ hiển thị danh sách sản phẩm với 4 sản phẩm/hàng

### 2. **Đăng ký tài khoản mới**
- Click nút "Đăng ký" trên thanh menu
- Điền thông tin:
  - Họ và tên
  - Email (phải duy nhất)
  - Mật khẩu (tối thiểu 8 ký tự)
  - Xác nhận mật khẩu
- Click "Tạo tài khoản"
- Sau khi đăng ký thành công, bạn sẽ được tự động đăng nhập

### 3. **Đăng nhập**
- Click nút "Đăng nhập" trên thanh menu
- Nhập email và mật khẩu
- Có thể tick "Ghi nhớ đăng nhập" để lần sau không cần nhập lại
- Click "Đăng nhập"

### 4. **Xem sản phẩm**
- **Trang chủ**: Hiển thị tất cả sản phẩm với 4 sản phẩm/hàng
- **Lọc danh mục**: Click các nút danh mục để lọc sản phẩm
- **Chi tiết sản phẩm**: Click vào tên hoặc hình ảnh sản phẩm

### 5. **Thông tin tồn kho**
- ✅ **Màu xanh**: Còn hàng (hiển thị số lượng)
- ⚠️ **Màu cam**: Ít hàng (≤10 sản phẩm)
- ❌ **Màu đỏ**: Hết hàng (nút mua bị vô hiệu hóa)

### 6. **Mua hàng**
- **Khi còn hàng**: Click "Thêm vào giỏ"
- **Khi hết hàng**: Nút sẽ bị disable và hiển thị "Hết hàng"
- **Chưa đăng nhập**: Hiển thị "Đăng nhập để mua"

### 7. **Giỏ hàng**
- Click icon giỏ hàng trên thanh menu để xem
- **Điều chỉnh số lượng**: Dùng nút +/- hoặc nhập trực tiếp
- **Xóa sản phẩm**: Click nút "Xóa" bên cạnh sản phẩm
- **Tóm tắt đơn hàng**: Hiển thị tổng tiền realtime

### 8. **Thanh toán**
- Từ giỏ hàng, click "Tiến hành thanh toán"
- **Nhập thông tin giao hàng**:
  - Số điện thoại (bắt buộc)
  - Địa chỉ chi tiết (bắt buộc)
  - Ghi chú (tùy chọn)
- **Chọn phương thức thanh toán**:
  - **COD**: Thanh toán khi nhận hàng
  - **Chuyển khoản**: Thanh toán trước qua ngân hàng
- Click "Đặt hàng" để hoàn tất

### 9. **Sau khi đặt hàng**
- **Trang thành công**: Hiển thị thông tin đơn hàng
- **Mã đơn hàng**: Được tạo tự động
- **Thông tin chuyển khoản**: Hiển thị nếu chọn thanh toán trước
- **Tự động trừ tồn kho**: Số lượng sản phẩm được cập nhật

### 10. **Quản lý tài khoản**
- Click vào tên người dùng trên thanh menu
- **Trang cá nhân**: Chỉnh sửa thông tin
- **Đăng xuất**: Thoát khỏi tài khoản

## 📦 SẢN PHẨM DEMO

### 📱 Điện tử (Electronics)
- iPhone 15 Pro (Còn 15 sản phẩm)
- Máy xay sinh tố (Hết hàng)
- Tai nghe Bluetooth (Còn 5 sản phẩm - ít hàng)
- MacBook Air M2 (Còn 25 sản phẩm)
- Samsung Galaxy S24 (Hết hàng)

### 💄 Làm đẹp (Beauty)
- Son môi Dior (Còn 8 sản phẩm - ít hàng)
- Kem dưỡng da (Còn 35 sản phẩm)
- Serum Vitamin C (Hết hàng)
- Sữa rửa mặt (Còn 50 sản phẩm)

### 👕 Quần áo (Clothing)
- Áo sơ mi nam (Còn 20 sản phẩm)
- Váy đầm nữ (Còn 3 sản phẩm - ít hàng)
- Quần jeans nam (Hết hàng)
- Áo khoác hoodie (Còn 12 sản phẩm)

## 🎨 TÍNH NĂNG NỔI BẬT

### ✨ Giao diện
- 📱 Responsive: Mobile (1 cột), Tablet (2 cột), Desktop (4 cột)
- 🖼️ SVG placeholder thông minh theo danh mục
- 🎭 Hover effects mượt mà
- 🌙 Lazy loading hình ảnh

### 🔒 Bảo mật
- 🔐 Hash password với bcrypt
- 🛡️ CSRF protection
- ✅ Email validation
- 🔑 Session management

### ⚡ Hiệu suất
- 💾 File cache system
- 🗃️ Database optimization
- 📦 Asset compression (CSS: 5.85kB, JS: 14.16kB)
- 🚀 Load time < 2s

### 📊 Quản lý tồn kho
- 📈 Hiển thị số lượng real-time
- ⚠️ Cảnh báo ít hàng
- 🚫 Vô hiệu hóa nút mua khi hết hàng
- 🎯 Giới hạn số lượng mua
- 🔄 Tự động trừ kho sau thanh toán

### 💳 Hệ thống thanh toán
- 🛒 Giỏ hàng session-based
- 📦 Checkout 2 bước (thông tin + thanh toán)
- 💰 2 phương thức: COD & Chuyển khoản
- 📋 Quản lý đơn hàng với trạng thái
- 📧 Thông tin chuyển khoản tự động lưu
- 🧾 Hóa đơn chi tiết sau đặt hàng

## 🐛 XỬ LÝ LỖI

### Nếu gặp lỗi cache:
```bash
php artisan config:clear
php artisan view:clear
```

### Nếu cần reset database:
```bash
php artisan migrate:fresh --seed
```

### Nếu assets không load:
```bash
npm run build
```

## 📞 HỖ TRỢ

Nếu có vấn đề gì, vui lòng:
1. Kiểm tra log: `storage/logs/laravel.log`
2. Restart server: `php artisan serve`
3. Clear cache: `php artisan config:clear`

---

**🎉 Chúc bạn có trải nghiệm mua sắm tuyệt vời với ShopOnline!**