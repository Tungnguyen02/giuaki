<?php
// Kiểm tra nếu có dữ liệu được gửửi từ trang trước
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

    // Thực hiện truy vấn để cập nhật thông tin nhân viên trong cơ sở dữ liệu
    $sql = "UPDATE nhanvien SET Ten_NV = '$tenNV', Phai = '$phai', Noi_Sinh = '$noiSinh', Ma_Phong = '$maPhong', Luong = '$luong'
            WHERE Ma_NV = '$maNV'";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin nhân viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Thực hiện kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ql_nhansu";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy thông tin về nhân viên cần chỉnh sửa
    $id = $_GET["id"];

    // Thực hiện truy vấn để lấy thông tin nhân viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM nhanvien WHERE Ma_NV = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maNV = $row["Ma_NV"];
        $tenNV = $row["Ten_NV"];
        $phai = $row["Phai"];
        $noiSinh = $row["Noi_Sinh"];
        $maPhong = $row["Ma_Phong"];
        $luong = $row["Luong"];
    } else {
        echo "Không tìm thấy nhân viên";
        exit;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa nhân viên</title>
</head>
<body>
    <h2>Sửa nhân viên</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="ma_nv" value="<?php echo $maNV; ?>">

        <label for="ten_nv">Tên nhân viên:</label>
        <input type="text" name="ten_nv" value="<?php echo $tenNV; ?>" required><br>

        <label for="phai">Phái:</label>
        <input type="text" name="phai" value="<?php echo $phai; ?>" required><br>

        <label for="noi_sinh">Nơi sinh:</label>
        <input type="text" name="noi_sinh" value="<?php echo $noiSinh; ?>" required><br>

        <label for="ma_phong">Mã phòng:</label>
        <input type="text" name="ma_phong" value="<?php echo $maPhong; ?>" required><br>

        <label for="luong">Lương:</label>
        <input type="text" name="luong" value="<?php echo $luong; ?>" required><br>

        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>