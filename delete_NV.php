<?php
// Kiểm tra nếu có dữ liệu được gửi từ trang trước
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Thực hiện kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ql_nhansu";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy thông tin về nhân viên cần xóa
    $id = $_GET["id"];

    // Thực hiện truy vấn để xóa nhân viên từ cơ sở dữ liệu
    $sql = "DELETE FROM nhanvien WHERE Ma_NV = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa nhân viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>