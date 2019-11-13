<?php
$result = mysqli_query($connection, "DELETE FROM students WHERE id={$_GET['id']}");
