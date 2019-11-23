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

if(!empty($_FILES['photos'])){
  echo 'enter here';
  for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
      $filename = microtime() . '.' . getExtension($_FILES['photos']['name'][$i]);
      echo $filename . '<br>';

      move_uploaded_file($_FILES['photos']['tmp_name'][$i], 'img/' . $filename);
  }

}

?>

<form action="" method="post" enctype="multipart/form-data">
  Photo <input type="file" name="photos[]" multiple> <br>

  <input type="submit" value="upload">
</form>

</body>
</html>
