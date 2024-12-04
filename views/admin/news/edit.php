if (!$news) {
echo "Bài viết không tồn tại!";
exit;
}
?>

<h2>Chỉnh sửa bài viết</h2>
<form action="index.php?controller=news&action=edit&id=<?php echo $news['id']; ?>" method="POST" enctype="multipart/form-data">
    <div>
        <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
    </div>
    <div>
        <label for="content">Nội dung:</label>
        <textarea id="content" name="content" rows="5" required><?php echo htmlspecialchars($news['content']); ?></textarea>
    </div>
    <div>
        <label for="image">Hình ảnh hiện tại:</label>
        <?php if ($news['image']): ?>
            <img src="uploads/<?php echo htmlspecialchars($news['image']); ?>" alt="Image" style="max-width: 200px;">
        <?php endif; ?>
        <br>
        <label for="new_image">Thay đổi hình ảnh:</label>
        <input type="file" id="new_image" name="image">
    </div>
    <div>
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id">
            <!-- Thêm các danh mục từ cơ sở dữ liệu nếu cần -->
            <option value="1" <?php echo ($news['category_id'] == 1) ? 'selected' : ''; ?>>Danh mục 1</option>
            <option value="2" <?php echo ($news['category_id'] == 2) ? 'selected' : ''; ?>>Danh mục 2</option>
            <option value="3" <?php echo ($news['category_id'] == 3) ? 'selected' : ''; ?>>Danh mục 3</option>
        </select>
    </div>
    <button type="submit">Cập nhật bài viết</button>
</form>