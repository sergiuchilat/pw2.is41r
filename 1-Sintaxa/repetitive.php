<?php
for ($i = 1; $i <= 10; $i++){
    echo $i;?> <br><?
}
?>

<hr>
<?
$i = 1;
while ( $i <= 10){
    echo $i;?> <br><?
    $i++;
}
?>
<hr>
<?
$i = 1;
do{
    echo $i;?> <br><?
    $i++;
}while ( $i <= 10);
?>
