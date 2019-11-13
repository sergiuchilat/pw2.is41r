<?php
$connection = mysqli_connect('localhost', 'root', '', 'is41r');
$result = mysqli_query($connection, "SELECT id, name FROM students");

?>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
        <?
        while($element = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?=$element['id'];?></td>
                <td><?=$element['name'];?></td>
            </tr>
            <?
        }?>
    </tbody>

</table>



