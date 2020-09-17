<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <?php include_once(__DIR__ . '/../../layouts/styles.php'); ?>
</head>

<body>
    <!-- header -->

    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>

    

<div class="container">
    <div class="row">
        <div class="col-md-4">


        <!-- slidebar -->

            <?php include_once(__DIR__ . '/../../layouts/partials/slidebar.php'); ?>
        </div>

        <div class="col-md-8">
            <h1>TRANG INDEX NE</h1>


    <?php
    // Truy vấn database để lấy danh sách
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    // C:\xampp\htdocs\web02\
    include_once(__DIR__ . '/../../../connect.php');
    // 2. Chuẩn bị QUERY
    // HERE DOC
    $sql = <<<EOT
    SELECT httt_ma AS MaThanhToan, httt_ten AS TenThanhToan FROM `hinhthucthanhtoan`
EOT;
    // 3. Yêu cầu PHP thực thi QUERY
    $result = mysqli_query($conn, $sql);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = array(
            'ma' => $row['MaThanhToan'],
            'ten' => $row['TenThanhToan'],
        );
    }
    // var_dump($data);die;
    // print_r($data);die;
    ?>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Mã Hình thức Thanh toán</th>
                <th>Tên Hình thức Thanh toán</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $httt): ?>
            <tr>
                <td><?= $httt['ma']; ?></td>
                <td><?= $httt['ten']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




        </div>


    </div>
</div>
        <!-- footer -->

    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>


<?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

</body>
</html>