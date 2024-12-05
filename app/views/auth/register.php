<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký TLUNEWS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://example.com/university.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-container label {
            display: block;
            margin-bottom: 5px;
        }

        .register-container input[type="text"],
        .register-container input[type="password"],
        .register-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .register-container button:hover {
            background-color: #0056b3;
        }

        .register-container .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-container .login-link a {
            color: #007BFF;
            text-decoration: none;
        }

        .register-container .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Đăng ký TLUNEWS</h1>
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?= htmlspecialchars($messageType) ?>"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form action="index.php?controller=auth&action=register" method="POST">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required>



            <button type="submit">Đăng ký</button>

            <div class="login-link">
                <a href="index.php?controller=auth&action=showLoginForm">Đã có tài khoản? Đăng nhập</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>