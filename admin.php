<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if(!isset($_SESSION['username'])){
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang admin</title>
</head>
<body>
    <h2>Chào mừng bạn <br>
         <?php echo $_SESSION['email']; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>