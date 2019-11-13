<?php
$ion = 50;
$vasile = 50;

if($ion > $vasile) {
    echo 'Ion este mai mare decit Vasile';
} elseif($ion < $vasile) {
    echo 'Vasile este mai mare decit Ion';
} else {
    echo 'Ion si Vasile au invatat intr-o clasa';
}

$cifra = 22;

switch ($cifra){
    case 0:
        echo 'Zero';
        break;
    case 1:
        echo 'Unu';
        break;
    case 2:
        echo 'Doi';
        break;
    default:
        echo 'Nu este cifra';
        break;
}
