<h2>Thêm bài viết mới</h2>
<form action="index.php?controller=news&action=add" method="POST" enctype="multipart/form-data">
    <div>
        <label for="title">Tiêu đề:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="content">Nội dung:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
    </div>
    <div>
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image">
    </div>
    <div>
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id">
            <!-- Thêm các danh mục từ cơ sở dữ liệu nếu cần -->
            <option value="1">Danh mục 1</option>
            <option value="2">Danh mục 2</option>
            <option value="3">Danh mục 3</option>
        </select>
    </div>
    <button type="submit">Thêm bài viết</button>
</form>