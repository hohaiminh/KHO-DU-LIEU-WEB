<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật dữ liệu MySQL với PHP</title>
</head>
<body>
    <?php
    // Truy vấn database để lấy danh sách
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    // C:\xampp\htdocs\web02\
    include_once(__DIR__ . '/connect.php');
    // 2. Chuẩn bị QUERY
    // HERE DOC
    $httt_ma = 1;
    $httt_ten = 'MOI NE';
    $sql = <<<EOT
    UPDATE hinhthucthanhtoan
    SET
        httt_ten='$httt_ten'
    WHERE httt_ma=$httt_ma
EOT;
    // 3. Yêu cầu PHP thực thi QUERY
    mysqli_query($conn, $sql);
    ?>
</body>
</html>