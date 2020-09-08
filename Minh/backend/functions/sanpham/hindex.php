<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <?php include_once(__DIR__ . '/../../layouts/styles.php'); ?>

        <link rel="stylesheet" type="text/css" href="../../../assets/vendor/DataTables/datatables.min.css"/>

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
    SELECT sp.*,lsp.lsp_ten, nsx.nsx_ma, km.km_ten, km.km_noidung,km.km_tungay,km.km_denngay
    FROM `sanpham` sp 
JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
JOIN `nhasanxuat` nsx ON sp.nsx_ma = nsx.nsx_ma
LEFT JOIN `khuyenmai` km ON sp.km_ma = km.km_ma
ORDER BY sp.sp_ma DESC

EOT;
    // 3. Yêu cầu PHP thực thi QUERY
    $result = mysqli_query($conn, $sql);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $km_tomtat = '';
        if (!empty($row['km_ten'])) {
            // Sử dụng hàm sprintf() để chuẩn bị mẫu câu với các giá trị truyền vào tương ứng từng vị trí placeholder
            $km_tomtat = sprintf(
                "Khuyến mãi %s, nội dung: %s, thời gian: %s-%s",
                $row['km_ten'],
                $row['km_noidung'],
                // Sử dụng hàm date($format, $timestamp) để chuyển đổi ngày thành định dạng Việt Nam (ngày/tháng/năm)
                // Do hàm date() nhận vào là đối tượng thời gian, chúng ta cần sử dụng hàm strtotime() 
                // để chuyển đổi từ chuỗi có định dạng 'yyyy-mm-dd' trong MYSQL thành đối tượng ngày tháng
                date('d/m/Y', strtotime($row['km_tungay'])),    //vd: '2019-04-25'
                date('d/m/Y', strtotime($row['km_denngay']))
            );  //vd: '2019-05-10'
        }







        $data[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
            'lsp_ma' => $row['lsp_ma'],
            'nsx_ma' => $row['nsx_ma'],
            'km_ma' => $row['km_ma'],
            'km_tomtat' => $km_tomtat
            
        );
    }
    // var_dump($data);die;
    // print_r($data);die;
    ?>

     <a href="create.php" class="btn btn-primary">Thêm mới</a>
    <table border="1" width="100%" id="tblDanhsach" class="table table-bordered">
    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Nhà sản xuất</th>
                            <th>Khuyến mãi</th>
                            <th>hành động</th>
                        </tr>
                    </thead>

            <!-- <tr>
                <td>Ma sp</td>
                <td>Ten sp</td>
                <td>Gia sp</td>
                <td>Loai sp</td>
                <td>Nha san xuat</td>
                <td>Khuyen mai</td>


            </tr>
       -->
       
           


             <tbody>
                        <?php foreach($data as $sp): ?>
                        <tr>
                            <td><?php echo $sp['sp_ma'] ?></td>
                            <td><?= $sp['sp_ten'] ?></td>
                            <td><?= $sp['sp_gia'] ?></td>
                            <td><?= $sp['lsp_ten'] ?></td>
                            <td><?= $sp['nsx_ten'] ?></td>
                            <td><?= $sp['km_tomtat'] ?></td>
                        
                            <td>
                                <a href="edit.php?sp_ma=<?php echo $sp['sp_ma'] ?>" class="btn btn-success">Sửa</a>
                                <a href="delete.php?sp_ma=<?php echo $sp['sp_ma'] ?>" class="btn btn-danger">Xóa</a>
                            </td>
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
<script type="text/javascript" src="../../../assets/vendor/DataTables/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#tblDanhsach').DataTable();
    });
    </script>


    <script type="text/javascript" src="../../../assets/vendor/sweetalert/sweetalert.min.js"></script>

</body>
</html>