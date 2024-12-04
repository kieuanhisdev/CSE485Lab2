<?php
require_once 'models/User.php';

class UserController
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::getAll();
        include 'views/users/index.php';
    }

    // Hiển thị form tạo mới người dùng
    public function create()
    {
        include 'views/users/create.php';
    }

    // Lưu người dùng mới
    public function store()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        User::create($username, $password, $role);
        header('Location: index.php?controller=user&action=index');
    }

    // Hiển thị thông tin chi tiết của người dùng
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            include 'views/users/show.php';
        } else {
            echo "Người dùng không tồn tại.";
        }
    }

    // Hiển thị form chỉnh sửa người dùng
    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            include 'views/users/edit.php';
        } else {
            echo "Người dùng không tồn tại.";
        }
    }

    // Cập nhật thông tin người dùng
    public function update($id)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        User::update($id, $username, $password, $role);
        header('Location: index.php?controller=user&action=index');
    }

    // Xóa người dùng
    public function delete($id)
    {
        User::delete($id);
        header('Location: index.php?controller=user&action=index');
    }
}
