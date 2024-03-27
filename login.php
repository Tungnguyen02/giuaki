<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if(isset($_SESSION['username'])){
    header("Location: index1.php"); // Chuyển hướng đến trang admin nếu đã đăng nhập
    exit();
}

// Kiểm tra xem người dùng đã gửi biểu mẫu đăng nhập chưa
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra email và mật khẩu
    if($email == 'tung@gmail.com' && $password == '1'){
        $_SESSION['username'] = $email;
        header("Location: index1.php"); // Chuyển hướng đến trang admin nếu đăng nhập thành công
        exit();
    } else {
        $error = "Sai email hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php if(isset($error)) { echo $error; } ?>
    <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Mật khẩu:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Đăng nhập">
    </form>
</body>
</html>