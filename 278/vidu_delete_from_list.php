<?php

    include_once(__DIR__ . '/../connect.php');

    $httt_ma = $_GET['idmuonxoa'];
    

    $sql = <<<EOT
    DELETE FROM `hinhthucthanhtoan` WHERE httt_ma=$httt_ma
EOT;

    mysqli_query($conn, $sql);

    header('location:vidu_select.php');

?>