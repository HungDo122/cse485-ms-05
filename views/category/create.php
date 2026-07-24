<!DOCTYPE html>
<html>
<head><title>Thêm danh mục</title></head>
<body>
    <h2>Thêm Danh Mục</h2>
    <?php if (isset($_SESSION['flash_error'])): ?>
        <p style="color: red;"><?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></p>
    <?php endif; ?>
    
    <form method="POST" action="index.php?controller=category&action=create">
        Tên: <input type="text" name="name" required><br><br>
        Mô tả: <textarea name="description"></textarea><br><br>
        <button type="submit">Lưu</button>
        <a href="index.php?controller=category&action=index">Hủy</a>
    </form>
</body>
</html>