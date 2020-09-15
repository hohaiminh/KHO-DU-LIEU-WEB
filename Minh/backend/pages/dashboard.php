<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
</head>

<body>
    <!-- header -->

    <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>

    

<div class="container">
    <div class="row">
        <div class="col-md-4">


        <!-- slidebar -->

            <?php include_once(__DIR__ . '/../layouts/partials/slidebar.php'); ?>
        </div>

        <div class="col-md-8">
            <h1>NOI DUNG DASH BOARD</h1>
        </div>


 <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-primary mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoSanPham_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số mặt hàng</div>
                </div>
              </div>
              <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
            </div>
             <!-- Tổng số mặt hàng -->


            
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-success mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoKhachHang_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tong so khach hang</div>
                </div>
              </div>
              <button class="btn btn-success btn-sm form-control" id="refreshBaoCaoKhachHang">Refresh dữ liệu</button>
            </div>


                        <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-info mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoGopY_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tong so gop y </div>
                </div>
              </div>
              <button class="btn btn-info btn-sm form-control" id="refreshBaoCaoGopY">Refresh dữ liệu</button>
            </div>


                                    <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-warning mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoDonHang_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tong so don dat hang</div>
                </div>
              </div>
              <button class="btn btn-warning btn-sm form-control" id="refreshBaoCaoDonHang">Refresh dữ liệu</button>
            </div>




    </div>
</div>
        <!-- footer -->

    <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>


<?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>


 <script>
    $(document).ready(function() {
      // ----------------- Tổng số mặt hàng --------------------------
      function getDuLieuBaoCaoTongSoMatHang() {
        $.ajax('/KHO-DU-LIEU-WEB/Minh/backend/api/baocao-tongsomathang.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            $('#baocaoSanPham_SoLuong').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoSanPham_SoLuong').html(htmlString);
          }
        });
      }
      $('#refreshBaoCaoSanPham').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoMatHang();
      });
      getDuLieuBaoCaoTongSoMatHang();
    });

      </script>

       <script>
    $(document).ready(function() {
      // ----------------- Tổng số Khach hang --------------------------
      function getDuLieuBaoCaoTongSoKhachHang() {
        $.ajax('/KHO-DU-LIEU-WEB/Minh/backend/api/baocao-tongsokhachhang.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            $('#baocaoKhachHang_SoLuong').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoKhachHang_SoLuong').html(htmlString);
          }
        });
      }
      $('#refreshBaoCaoKhachHang').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoKhachHang();
      });
      getDuLieuBaoCaoTongSoKhachHang();

    });

      </script>


             <script>
    $(document).ready(function() {
      // ----------------- Tổng số Khach hang --------------------------
      function getDuLieuBaoCaoTongSoKhachHang() {
        $.ajax('/KHO-DU-LIEU-WEB/Minh/backend/api/baocao-tongsogopy.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            $('#baocaoGopY_SoLuong').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoGopY_SoLuong').html(htmlString);
          }
        });
      }
      $('#refreshBaoCaoGopY').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoKhachHang();
      });
    });

      </script>

                   <script>
    $(document).ready(function() {
      // ----------------- Tổng số Khach hang --------------------------
      function getDuLieuBaoCaoTongSoKhachHang() {
        $.ajax('/KHO-DU-LIEU-WEB/Minh/backend/api/baocao-tongsodonhang.php', {
          success: function(data) {
            var dataObj = JSON.parse(data);
            var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
            $('#baocaoDonHang_SoLuong').html(htmlString);
          },
          error: function() {
            var htmlString = `<h1>Không thể xử lý</h1>`;
            $('#baocaoDonHang_SoLuong').html(htmlString);
          }
        });
      }
      $('#refreshBaoCaoDonHang').click(function(event) {
        event.preventDefault();
        getDuLieuBaoCaoTongSoKhachHang();
      });
    });

      </script>


</body>
</html>