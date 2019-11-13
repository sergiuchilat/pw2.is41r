<?php
$result = mysqli_query($connection, "SELECT id, name FROM students");
?>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?
    while($element = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?=$element['id'];?></td>
            <td><?=$element['name'];?></td>
            <td><a href="index.php?module=students&action=delete&id=<?=$element['id'];?>">x</a></td>
        </tr>
        <?
    }?>
    </tbody>

</table>
