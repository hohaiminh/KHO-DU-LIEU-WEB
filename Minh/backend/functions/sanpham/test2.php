<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách Hình thức thanh toán</title>
    <?php include_once(__DIR__ . '/../../layouts/styles.php'); ?>
    <!-- DataTable CSS -->
    <link href="/KHO-DU-LIEU-WEB/Minh/assets/vendor/DataTables/datatables.css" type="text/css" rel="stylesheet" />
    <link href="/KHO-DU-LIEU-WEB/Minh/assets/vendor/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    
    <!-- header -->
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
    <!-- end header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- sidebar -->
                <?php include_once(__DIR__ . '/../../layouts/partials/slidebar.php'); ?>
                <!-- end sidebar --
            </div>
            <div class="col-md-8">
                <h1>Danh sách Sản phẩm</h1>
                <?php
                    // Truy vấn database để lấy danh sách
                    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
                    // C:\xampp\htdocs\web02\
                    include_once(__DIR__ . '/../../../connect.php');
                    // 2. Chuẩn bị QUERY
                    // HERE DOC
                    $sql = <<<EOT
                    SELECT sp.*
                        , lsp.lsp_ten
                        , nsx.nsx_ten
                        , km.km_ten, km.km_noidung, km.km_tungay, km.km_denngay
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
                        
                        $km_ten = $row['km_ten'];
                        $km_noidung = $row['km_noidung'];
                        // Sử dụng hàm date($format, $timestamp) để chuyển đổi ngày thành định dạng Việt Nam (ngày/tháng/năm)
                        // Do hàm date() nhận vào là đối tượng thời gian, chúng ta cần sử dụng hàm strtotime() 
                        // để chuyển đổi từ chuỗi có định dạng 'yyyy-mm-dd' trong MYSQL thành đối tượng ngày tháng
                        $km_tungay = date('d/m/Y', strtotime($row['km_tungay']));    //vd: '2019-04-25'
                        $km_denngay = date('d/m/Y', strtotime($row['km_denngay']));    //vd: '2019-04-25'
                        $km_tomtat = '';
                        if( !empty($km_ten)  ) {
                            $km_tomtat = sprintf("Khuyến mãi %s, nội dung: %s, thời gian: %s - %s",
                                                $km_ten,
                                                $km_noidung,
                                                $km_tungay,
                                                $km_denngay);
                        }
                        $data[] = array(
                            'sp_ma' => $row['sp_ma'],
                            'sp_ten' => $row['sp_ten'],
                            // Sử dụng hàm number_format(số tiền, số lẻ thập phân, dấu phân cách số lẻ, dấu phân cách hàng nghìn) 
                            // để định dạng số khi hiển thị trên giao diện. 
                            // Vd: 15800000 -> format thành 15,800,000.66 vnđ
                            'sp_gia' => number_format($row['sp_gia'], 0, ".", ",") . ' vnđ',
                        
                            'lsp_ten' => $row['lsp_ten'],
                            'nsx_ten' => $row['nsx_ten'],
                            'km_tomtat' => $km_tomtat
                        );
                    }
                    // print_r($data);
                    ?>
                <a href="create.php" class="btn btn-primary">Thêm mới</a>
                <table id="tblDanhsach" class="table table-bordered">
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
                                <button class="btn btn-danger btnDelete" data-sp_ma="<?= $sp['sp_ma'] ?>">Xóa</button>
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
    <!-- end footer -->
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
    <!-- DataTable JS -->
    <script src="/KHO-DU-LIEU-WEB/Minh/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/KHO-DU-LIEU-WEB/Minh/assets/vendor/DataTables/Buttons-1.6.3/js/buttons.bootstrap4.min.js"></script>
    <script src="/KHO-DU-LIEU-WEB/Minh/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/KHO-DU-LIEU-WEB/Minh/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    
    <!-- SweetAlert -->
    <script src="/KHO-DU-LIEU-WEB/Minh/assets/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        // xử lý table danh sách
        $('#tblDanhsach').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
        // Cảnh báo khi xóa
        // 1. Đăng ký sự kiện click cho các phần tử (element) đang áp dụng class .btnDelete
        $('.btnDelete').click(function() {
            // Click hanlder
            // Hiện cảnh báo khi bấm nút xóa
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Một khi đã xóa, không thể phục hồi....",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                debugger;
                if (willDelete) { // Nếu đồng ý xóa
                    
                    // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'sp_ma'
                    // var sp_ma = $(this).attr('data-sp_ma');
                    var sp_ma = $(this).data('sp_ma');
                    var url = "delete.php?sp_ma=" + sp_ma;
                    
                    // Điều hướng qua trang xóa với REQUEST GET, có tham số sp_ma=...
                    location.href = url;
                } else {
                    swal("Cẩn thận hơn nhé!");
                }
            });
           
        });
    });
    </script>
</body>
</html>