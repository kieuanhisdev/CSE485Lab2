<?php
// Yêu cầu thủ công CategoryController.php
require_once __DIR__ . '/../../controllers/CategoryController.php';

use App\Controllers\CategoryController;

$categoryController = new CategoryController();
$categories = $categoryController->index(); // Lấy tất cả danh mục từ controller
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Danh sách danh mục</h2>

        <!-- Hiển thị thông báo nếu có -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <!-- Bảng danh sách danh mục -->
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $category->getId(); ?></td>
                            <td><?php echo htmlspecialchars($category->getName()); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center">Không có danh mục nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Nút thêm và chỉnh sửa danh mục -->
        <div class="d-flex justify-content-center mb-4">
            <a href="index.php?controller=category&action=create" class="btn btn-success me-2">Thêm danh mục</a>
            <button id="editCategoryButton" class="btn btn-warning">Chỉnh sửa danh mục</button>
        </div>

        <!-- Form chỉnh sửa danh mục (ẩn mặc định) -->
        <div id="editCategoryForm" class="mt-4 d-none">
            <h3>Chỉnh sửa danh mục</h3>
            <form action="index.php?controller=category&action=update" method="POST">
                <div class="mb-3">
                    <label for="editId" class="form-label">ID</label>
                    <input type="text" id="editId" name="id" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="editName" class="form-label">Tên danh mục</label>
                    <input type="text" id="editName" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('editCategoryButton').addEventListener('click', function () {
            const editForm = document.getElementById('editCategoryForm');
            editForm.classList.toggle('d-none');

            const firstRow = document.querySelector('table tbody tr');
            if (firstRow) {
                const idCell = firstRow.cells[0].textContent;
                const nameCell = firstRow.cells[1].textContent;

                document.getElementById('editId').value = idCell.trim();
                document.getElementById('editName').value = nameCell.trim();
            } else {
                alert('Không có danh mục nào để chỉnh sửa.');
            }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
