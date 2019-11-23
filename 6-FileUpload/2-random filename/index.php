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
function getExtension($filename){
  // i.am.a.image.jpg
    $parts = explode('.', $filename);
    return $parts[count($parts) - 1];
}

//echo getExtension('i.am.a.image.jpg');

if(!empty($_FILES['photo'])){
  $filename = microtime() . '.' . getExtension($_FILES['photo']['name']);

  move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $filename);
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
