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
function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

//echo getExtension('i.am.a.image.jpg');

if(!empty($_FILES['photos'])){
  echo 'enter here';
  for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
      $filename = microtime() . '.' . getExtension($_FILES['photos']['name'][$i]);
      echo $filename . '<br>';

      move_uploaded_file($_FILES['photos']['tmp_name'][$i], 'img/' . $filename);
      $img = resize_image('img/' . $filename, 200, 200, true);
      imagejpeg($img, 'img/small_' . $filename);
  }

}

?>

<form action="" method="post" enctype="multipart/form-data">
  Photo <input type="file" name="photos[]" multiple> <br>

  <input type="submit" value="upload">
</form>

</body>
</html>
