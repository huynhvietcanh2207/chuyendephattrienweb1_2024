<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = base64_decode($_GET['id']); // Giải mã ID
    $user = $userModel->findUserById($_id); // Cập nhật người dùng hiện tại
}

if (!empty($_POST['submit'])) {
    if (!empty($_id)) {
        $result = $userModel->updateUser($_POST); // Try to update user
        if (isset($result['error'])) {
            // Nếu có lỗi xung đột version, hiển thị thông báo
            echo '<div class="alert alert-danger" role="alert">' . $result['error'] . '</div>';
        } else {
            header('location: list_users.php');
        }
    } else {
        $userModel->insertUser($_POST); // Insert new user
        header('location: list_users.php');
    }
}
// Validate (xác thực) về server vì tính bảo mật và an toàn 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $password = $_POST['password'];

    // xác thực name
    if (empty($name)) {
        echo "Tên là bắt buộc.<br>";
    } elseif (!preg_match("/^[a-zA-Z0-9]{5,15}$/", $name)) {
        echo "Tên phải có độ dài từ 5 đến 15 ký tự và chỉ được chứa chữ cái và số.<br>";
    }

    // xác thực password
    if (empty($password)) {
        echo "Mật khẩu là bắt buộc.<br>";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
        echo "Mật khẩu phải có độ dài từ 5 đến 10 ký tự, bao gồm chữ thường, chữ HOA, số và ký tự đặc biệt.<br>";
    }

    // Nếu không có lỗi, thực hiện cập nhật người dùng
    if (!empty($name) && !empty($password) && preg_match("/^[a-zA-Z0-9]{5,15}$/", $name) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
      
        echo "Thông tin người dùng đã được cập nhật thành công.";
    }
}
//delete

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST" name="updateForm" onsubmit="return validateForm()" >
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <?php if (!empty($user[0]['version'])) { ?>
                    <!-- Trường version để xử lý optimistic locking -->
                    <input type="hidden" name="version" value="<?php echo $user[0]['version']; ?>">
                <?php } ?>


                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
<script>
function validateForm() {
    let name = document.forms["updateForm"]["name"].value;
    let password = document.forms["updateForm"]["password"].value;

    // Validate name
    const nameRegex = /^[a-zA-Z0-9]{5,15}$/;
    if (name === "") {
        alert("Tên là bắt buộc.");
        return false;
    }
    if (!nameRegex.test(name)) {
        alert("Tên phải có độ dài từ 5 đến 15 ký tự và chỉ được chứa chữ cái và số.");
        return false;
    }

    // Validate password
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/;
    if (password === "") {
        alert("Mật khẩu là bắt buộc");
        return false;
    }
    if (!passwordRegex.test(password)) {
        alert("Mật khẩu phải có độ dài từ 5 đến 10 ký tự, bao gồm chữ thường, chữ HOA, số và ký tự đặc biệt.");
        return false;
    }

    return true; // Allow form submission if all validation passes
}
</script>

</html>