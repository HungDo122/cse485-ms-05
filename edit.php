<!DOCTYPE html>
<html>
<head><title>Sửa danh mục</title></head>
<body>
    <h2>Sửa Danh Mục: <?= htmlspecialchars($category['name']) ?></h2>
    <?php if (isset($_SESSION['flash_error'])): ?>
        <p style="color: red;"><?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></p>
    <?php endif; ?>
    
    <form method="POST" action="index.php?controller=category&action=edit&id=<?= $category['id'] ?>">
        Tên: <input type="text" name="name" value="<?= htmlspecialchars($category['name']) ?>" required><br><br>
        Mô tả: <textarea name="description"><?= htmlspecialchars($category['description'] ?? '') ?></textarea><br><br>
        <button type="submit">Cập nhật</button>
        <a href="index.php?controller=category&action=index">Hủy</a>
    </form>
</body>
</html>