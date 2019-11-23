<?php
$result = mysqli_query($connection, "SELECT id, name, group_id, avatar FROM students WHERE id={$_GET['id']}");

if($result){
    $student = mysqli_fetch_assoc($result);
    $_SESSION['cart'][$student['id']]= $student;
    $msg = 'Student ' . $student['name'] .' added to cart';
}

?>
<div class="alert alert-success"><?=$msg?></div>
<a href="?module=students&action=read">back</a>
