<!DOCTYPE html>
<html>
<head><title>Danh sách Category</title></head>
<body>
    <h1>Quản lý Danh mục (MVC Mini)</h1>
    
    <!-- Hiển thị Flash Message 1 lần -->
    <?php if (isset($_SESSION['flash_success'])): ?>
        <p style="color: green;"><?= $_SESSION['flash_success']; unset($_SESSION['flash_success']); ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION['flash_error'])): ?>
        <p style="color: red;"><?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></p>
    <?php endif; ?>

    <a href="index.php?controller=category&action=create">Thêm mới</a>
    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px;">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($categories as$cat): ?>
        <tr>
            <td><?= htmlspecialchars($cat['id']) ?></td>
            <td><?= htmlspecialchars($cat['name']) ?></td>
            <td><?= htmlspecialchars($cat['description'] ?? '') ?></td>
            <td>
                <a href="index.php?controller=category&action=edit&id=<?= $cat['id'] ?>">Sửa</a> |
                <form action="index.php?controller=category&action=delete" method="POST" style="display:inline;" onsubmit="return confirm('Xóa danh mục này?');">
                    <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>