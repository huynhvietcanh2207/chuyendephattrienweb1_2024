<?php
// delete_user.php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

// Kiểm tra xem người dùng có đăng nhập hay không
if (!isset($_SESSION['user_id'])) {
    echo "Bạn phải đăng nhập để thực hiện thao tác này.";
    exit;
}

// Lấy ID người dùng từ session
$loggedInUserId = $_SESSION['user_id'];

// Lấy ID người dùng từ URL (được mã hóa bằng base64)
$userIdToDelete = base64_decode($_GET['id']);

// Kiểm tra xem người dùng hiện tại có được phép xóa user này không
if ($loggedInUserId != $userIdToDelete) {
    echo "Bạn không có quyền xóa tài khoản này.";
    exit;
}

// Nếu phương thức là POST, tiến hành xác thực thông tin đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    $user = $userModel->findUser($loggedInUserId);

    if ($user['name'] === $username && password_verify($password, $user['password'])) {
        // Xác thực thành công, thực hiện xóa tài khoản
        $userModel->deleteUserById($loggedInUserId);
        echo "Tài khoản đã được xóa thành công.";
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng. Bạn không thể xóa tài khoản.";
    }
} else {
    // Hiển thị form yêu cầu nhập lại thông tin đăng nhập
    echo '
    <form method="POST" action="">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Xác nhận xóa</button>
    </form>';
}
