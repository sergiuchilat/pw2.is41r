<?php

if(mysqli_query($connection, "DELETE FROM students WHERE id={$_GET['id']}")){
    $msg = 'Succesfuly deleted!';
} else {
    $msg = 'Delete error!';
}

$result = mysqli_query($connection, "
  SELECT 
    students.id, 
    students.name,
    students.avatar,
    groups.NAME AS group_name
    
  FROM 
    students
  LEFT JOIN `groups` ON students.group_id = groups.id
");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Students</li>
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
      <th>Avatar</th>
      <th>ID</th>
      <th>Name</th>
      <th>Group name</th>
      <th>
        <a class="btn btn-primary" href="?module=students&action=create">Create</a>
      </th>
    </tr>
    </thead>
    <tbody>
    <?
    while($element = mysqli_fetch_assoc($result)){

      if(empty($element['avatar']) || !file_exists('../public/img/user_avatar/' . $element['avatar'])){
          $element['avatar'] = 'no_image.jpg';
      }
        ?>
      <tr>
        <td>
          <img src="../public/img/user_avatar/<?=$element['avatar'];?>" alt="">
        </td>
        <td><?=$element['id'];?></td>
        <td><?=$element['name'];?></td>
        <td><?=$element['group_name'];?></td>
        <td>
          <a href="index.php?module=students&action=read&id=<?=$element['id'];?>" onclick="return confirm('Do you want to delete?')">X</a>
          <a href="index.php?module=students&action=update&id=<?=$element['id'];?>">M</a>
        </td>
      </tr>
        <?
    }?>
    </tbody>

  </table>
  <? }?>
</div>

