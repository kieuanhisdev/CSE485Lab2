<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Quản trị viên</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>
    <form action="index.php?controller=admin&action=handleLogin" method="POST">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
