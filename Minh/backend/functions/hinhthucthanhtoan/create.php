<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREATE</title>

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
            <h1>THEM MOI HTTT</h1>


    <form name="frmHTTT" id="frmHTTT" method="post" action="">
        <table>
            <tr>
                <td> <label for="exampleInputEmail1"> Tên hình thức thanh toán: </label></td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" name="httt_ten" id="httt_ten">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="btnSave" id="btnSave" value="Lưu dữ liệu" />
                <a class="btn btn-outline-primary" href="index.php"> Quay  ve danh sach</a>
            </td>
            </tr>
        </table>

      
        <br />
       
    </form>
    <?php
    // Nếu người dùng đã bấm SAVE
    if(isset($_POST['btnSave'])) {
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        // C:\xampp\htdocs\web02\
        include_once(__DIR__ . '/../../../connect.php');
        // 2. Chuẩn bị QUERY
        $httt_ten = $_POST['httt_ten']; //new new
        $sql = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES('$httt_ten');";
        // 3. Thực thi
        mysqli_query($conn, $sql);
    }
    ?>




        </div>


    </div>
</div>
        <!-- footer -->

    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>


    <!-- <script>
    $(document).ready(function() {
      $("#frmLoaiSanPham").validate({
        rules: {
          category_code: {
            required: true,
            minlength: 3,
            maxlength: 50
          },
          category_name: {
            required: true,
            minlength: 3,
            maxlength: 50
          },
          description: {
            required: true,
            minlength: 3,
            maxlength: 255
          }
        },
        messages: {
          category_code: {
            required: "Vui lòng nhập Mã Loại sản phẩm",
            minlength: "Mã Loại sản phẩm phải có ít nhất 3 ký tự",
            maxlength: "Mã Loại sản phẩm không được vượt quá 50 ký tự"
          },
          category_name: {
            required: "Vui lòng nhập tên Loại sản phẩm",
            minlength: "Tên Loại sản phẩm phải có ít nhất 3 ký tự",
            maxlength: "Tên Loại sản phẩm không được vượt quá 50 ký tự"
          },
          description: {
            required: "Vui lòng nhập mô tả cho Loại sản phẩm",
            minlength: "Mô tả cho Loại sản phẩm phải có ít nhất 3 ký tự",
            maxlength: "Mô tả cho Loại sản phẩm không được vượt quá 255 ký tự"
          },
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
          // Thêm class `invalid-feedback` cho field đang có lỗi
          error.addClass("invalid-feedback");
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        success: function(label, element) {},
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        }
      });
    });
  </script> -->


<?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

</body>
</html>