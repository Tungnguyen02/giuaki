<?php
session_start();

// Xóa tất cả thông tin phiên làm việc
session_unset();

// Hủy phiên làm việc
session_destroy();

header("Location: login.php"); // Chuyển hướng đến trang đăng nhập sau khi logout
exit();
?>