<?php
include_once(__DIR__.'/../../connect.php');

$sqlSoLuongSanPham = "select count(*) as SoLuong from `dondathang`";
$result = mysqli_query($conn, $sqlSoLuongSanPham);

$dataSoLuongDonDatHang = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataSoLuongDonDatHang[] = array(
        'SoLuong' => $row['SoLuong'] 
    );
}

echo json_encode($dataSoLuongDonDatHang[0]);

?>