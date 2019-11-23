<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<pre>
<?
print_r($_FILES);
?>
  </pre>

<?
if(!empty($_FILES['photo'])){
  move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $_FILES['photo']['name']);
}
if(!empty($_FILES['cv'])){
    move_uploaded_file($_FILES['cv']['tmp_name'], 'cv/' . $_FILES['cv']['name']);
}
?>

<form action="" method="post" enctype="multipart/form-data">
  Photo <input type="file" name="photo"> <br>
  CV <input type="file" name="cv"> <br>
  <input type="submit" value="upload">
</form>

</body>
</html>
