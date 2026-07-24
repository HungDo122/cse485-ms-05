# Kiến trúc MVC Mini - Phiếu 05

## 1. Sơ đồ luồng xử lý (Thêm Category)
```text
[Browser] GET /index.php?controller=category&action=create
   │
   ▼
[Front Controller (index.php)] ──kiểm tra whitelist──► Khởi tạo CategoryController
   │
   ▼
[CategoryController::create()] 
   │ 
   ├── (Nếu GET)  ──► Nạp HTML form từ [views/category/create.php] ──► Trả về Browser
   │
   └── (Nếu POST) ──► Nhận data $_POST
          │
          ▼
      Gọi CategoryModel::create($name,$desc)
          │
          ▼
      [Database] Thực thi câu lệnh INSERT
          │
          ▼
      Controller gán $_SESSION['flash_success'] = "Thành công"
          │
          ▼
      Controller Redirect (Header Location) về index ──► Tránh submit lại form khi F5