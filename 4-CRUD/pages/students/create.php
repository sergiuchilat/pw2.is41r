<?
if($_POST['name'] != '') {
    mysqli_query($connection, "INSERT INTO students SET name = '{$_POST['name']}'");
}
?>
<form action="" method="post">
    Student name <input type="text" name="name">
    <input type="submit" value="add">
</form>
