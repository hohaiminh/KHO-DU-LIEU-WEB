<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name="frmHTTT" id="frmHTTT" method="post" action="">

        Tên hình thức thanh toán: <input type="text" name="httt_ten" id="httt_ten" />
        <br />
        <input type="submit" name="btnSave" id="btnSave" value="Lưu dữ liệu" />
        
    </form>

    <?php

    if(isset($_POST['btnSave'])) {

        include_once(__DIR__ . '/../connect.php');



        $httt_ten = $_POST['httt_ten'];
        $sql = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES('$httt_ten');";



        mysqli_query($conn, $sql);
    }
    ?>

    
</body>
</html>