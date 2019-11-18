<?php

if(mysqli_query($connection, "DELETE FROM `groups` WHERE id={$_GET['id']}")){
    $msg = 'Succesfuly deleted!';
} else {
    $msg = 'Delete error!';
}

$result = mysqli_query($connection, "SELECT id, name FROM `groups`");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Groups</li>
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
      <th>Name</th>
      <th>
        <a class="btn btn-primary" href="?module=groups&action=create">Create</a>
      </th>
    </tr>
    </thead>
    <tbody>
    <?
    while($element = mysqli_fetch_assoc($result)){
        ?>
      <tr>
        <td><?=$element['id'];?></td>
        <td><?=$element['name'];?></td>
        <td>
          <a href="index.php?module=groups&action=read&id=<?=$element['id'];?>" onclick="return confirm('Do you want to delete?')">X</a>
          <a href="index.php?module=groups&action=update&id=<?=$element['id'];?>">M</a>
        </td>
      </tr>
        <?
    }?>
    </tbody>

  </table>
  <? }?>
</div>

