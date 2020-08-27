<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    include_once(__DIR__ . '/../connect.php');

    $sql = <<<EOT
    SELECT httt_ma AS MaThanhToan, httt_ten AS TenThanhToan FROM `hinhthucthanhtoan`
EOT;

    $result = mysqli_query($conn, $sql);

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
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $httt): ?>
            <tr>
                <td><?= $httt['ma']; ?></td>
                <td><?= $httt['ten']; ?></td>
                <td>
                    <a href="vidu_delete_from_list.php?idmuonxoa=<?php echo $httt['ma']; ?>">Xóa</a>

                    <!-- Nút Sửa -->
                    <a href="vidu_update_form.php?httt_ma=<?php echo $httt['ma']; ?>">Sửa</a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    
</body>
</html>