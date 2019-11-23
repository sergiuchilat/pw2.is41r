<?php


$result = mysqli_query($connection, "
  SELECT 
    orders.id, 
    orders.client_name,
    orders.client_phone,
    orders.client_email
  FROM 
    orders
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
                        <a href="index.php?module=orders&action=details&id=<?=$element['id'];?>">D</a>
                    </td>
                </tr>
                <?
            }?>
            </tbody>

        </table>
    <? }?>
</div>

