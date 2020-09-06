<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


    // Truy vấn database để lấy danh sách
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    // Ví dụ: file đang viết code ở /example/thuc_thi_cau_lenh_insert.php
    // C:\xampp\htdocs\web02\dbconnect.php vào file đang viết code
    // 
    include_once(__DIR__ . '/connect.php');
    // 2. Chuẩn bị QUERY
    $tenhinhthucthanhtoan = 'MINH MINH'; //$_POST['httt_ten'];
    $sql = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES(N'$tenhinhthucthanhtoan');";
    
   var_dump($sql);
    die;
    
    // 3. Thực thi
    mysqli_query($conn, $sql);
    ?>

</body>
</html>