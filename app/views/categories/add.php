<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm danh mục mới</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h3>Thêm danh mục mới</h3>
    <form action="index.php?controller=category&action=store" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>
      <button type="submit" class="btn btn-primary">Thêm danh mục</button>
      <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
  </div>
</body>
</html>
