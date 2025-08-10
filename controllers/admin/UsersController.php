<?php
require_once './models/UsersModel.php';

class UsersController
{
    public function index()
    {
        $users = (new UsersModel())->getAllUsers();
        $viewFile = './views/admin/users/list.php';
        include './views/admin/layout.php';
    }

    public function add()
    {
        $viewFile = './views/admin/users/add.php';
        include './views/admin/layout.php';
    }

    public function store()
    {
        (new UsersModel())->insertUser($_POST);
        header('Location: index.php?act=admin/users');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die('Không tìm thấy người dùng');
        }
        $user = (new UsersModel())->getUserById($id);
        $viewFile = './views/admin/users/edit.php';
        include './views/admin/layout.php';
    }

    public function update()
    {
        (new UsersModel())->updateUser($_POST['id'], $_POST);
        header('Location: index.php?act=admin/users');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new UsersModel())->deleteUser($id);
        }
        header('Location: index.php?act=admin/users');
        exit;
    }
}
