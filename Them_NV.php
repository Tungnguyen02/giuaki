<?php
// Kiểm tra nếu có dữ liệu được gửi từ biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thực hiện kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ql_nhansu";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ biểu mẫu
    $maNV = $_POST["ma_nv"];
    $tenNV = $_POST["ten_nv"];
    $phai = $_POST["phai"];
    $noiSinh = $_POST["noi_sinh"];
    $maPhong = $_POST["ma_phong"];
    $luong = $_POST["luong"];

    // Thực hiện truy vấn để thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong)
            VALUES ('$maNV', '$tenNV', '$phai', '$noiSinh', '$maPhong', '$luong')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm nhân viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên</title>
</head>
<body>
    <h2>Thêm nhân viên</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="ma_nv">Mã nhân viên:</label>
        <input type="text" name="ma_nv" required><br>

        <label for="ten_nv">Tên nhân viên:</label>
        <input type="text" name="ten_nv" required><br>

        <label for="phai">Phái:</label>
        <input type="text" name="phai" required><br>

        <label for="noi_sinh">Nơi sinh:</label>
        <input type="text" name="noi_sinh" required><br>

        <label for="ma_phong">Mã phòng:</label>
        <input type="text" name="ma_phong" required><br>

        <label for="luong">Lương:</label>
        <input type="text" name="luong" required><br>

        <input type="submit" value="Thêm nhân viên">
    </form>
</body>
</html>