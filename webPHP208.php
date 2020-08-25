<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOC WEB PHP NGAY 20/8 </title>
</head>
<body>

<?php
// define ("FAVMOVIE", "The Life of Brian");
// echo "My favorite movie is";
// echo FAVMOVIE;
// $FAVMOVIE = "TITANIC";
// ECHO "<br/>Your favorite movie is ". $FAVMOVIE;

 $a = 5;
 $b = 6;
$tong = $a + $b;
$hieu = $a - $b;
$tich = $a * $b;
$thuong = $a / $b;
$trungbinhcong = ($tong) /2 ;
$songuyen = floor($thuong);
echo 'So a la:' . $a . '<br />';
echo 'So b la: ' .$b. '<br />';
echo 'Tong la:' . $tong. '<br />';
echo 'Thuong la:' . $thuong. '<br />';
echo 'So nguyen: ' . $songuyen;



?>


<?php
$sodong = 4;
$socot = 5;


?>

<table width="100%"  border="1" cellpadding="5" cellspacing="0"  >
<?php
for($i=1; $i<=$sodong; $i++){
    echo "<tr>";
    for($k=1; $k<=$socot; $k++){
        echo "<td> Dong" .$i. "cot" .$k. "</td>";
    }
    echo "</tr>";
}


?>
</table>



    
</body>
</html>