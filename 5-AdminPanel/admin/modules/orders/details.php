<?php

$result = mysqli_query($connection, "
        SELECT 
            orders.id, 
            orders.client_name,
            orders.client_phone,
            orders.client_email
        FROM 
            orders
        WHERE 
	        orders.id =  {$_GET['id']}
");

$resultContent = mysqli_query($connection, "
        SELECT
            order_content.order_id,
            order_content.product_id,
            order_content.quantity,
            students.name
        FROM
            order_content
        INNER JOIN students ON students.id = order_content.product_id
        WHERE
            order_content.order_id = {$_GET['id']}
");

?>
<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
</div>
<div class="row">
    <?
    if(!$result){?>
        <div class="alert alert-warning" role="alert">
            No data
        </div>
    <?} else {?>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Client name</th>
                <th>Client phone</th>
                <th>Client e-mail</th>
                <th>
                    <a class="btn btn-primary" href="?module=students&action=create">Create</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?
            while($element = mysqli_fetch_assoc($result)){
                ?>
                <tr>

                    <td><?=$element['id'];?></td>
                    <td><?=$element['client_name'];?></td>
                    <td><?=$element['client_phone'];?></td>
                    <td><?=$element['client_email'];?></td>
                    <td>
                        <a href="index.php?module=orders&action=detail&id=<?=$element['id'];?>">D</a>
                    </td>
                </tr>
                <?
            }?>
            </tbody>

        </table>
    <? }?>
</div>

<div class="row">
    <?
    if(!$resultContent){?>
      <div class="alert alert-warning" role="alert">
        No data
      </div>
    <?} else {?>
      <table class="table">
        <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?
        while($element = mysqli_fetch_assoc($resultContent)){
            ?>
          <tr>

            <td><?=$element['name'];?></td>
            <td><?=$element['quantity'];?></td>
          </tr>
            <?
        }?>
        </tbody>

      </table>
    <? }?>
</div>

