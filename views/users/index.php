<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách người dùng</h1>
        <a href="index.php?controller=user&action=create" class="btn btn-primary mb-3">Thêm người dùng</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['role'] == 1 ? 'Quản trị viên' : 'Người dùng') ?></td>
                            <td>
                                <a href="index.php?controller=user&action=show&id=<?= htmlspecialchars($user['id']) ?>"
                                    class="btn btn-info btn-sm">Xem</a>
                                <a href="index.php?controller=user&action=edit&id=<?= htmlspecialchars($user['id']) ?>"
                                    class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?controller=user&action=delete&id=<?= htmlspecialchars($user['id']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Không có người dùng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>