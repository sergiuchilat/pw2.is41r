<?php

$result = mysqli_query($connection,
    "
    INSERT INTO orders
    SET
        client_name = '{$_POST['name']}',
        client_phone = '{$_POST['phone']}',
        client_email = '{$_POST['email']}'
");

$orderID = mysqli_insert_id($connection);
//todo fix multi insert
foreach ($_SESSION['cart'] as $product) {
    $result = mysqli_query($connection,
        "
        INSERT INTO order_content
        SET
            order_id = '{$orderID}',
            product_id = '{$product['id']}',
            quantity = 1
    ");
}
unset($_SESSION['cart']);
mail('chilatsergiu@gmail.com', 'Order confirmation', "Thank you. Order N.  {$orderID} was created");
?>

<div class="alert alert-success">Thank you. Order N. <?=$orderID;?> was created</div>
<a href="?module=students&action=read">back</a>
