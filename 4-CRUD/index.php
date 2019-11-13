<?
$connection = mysqli_connect('localhost', 'root', '', 'is41r');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/site.css">
</head>
<body>
<nav>
    <? include 'blocks/menu.php';?>
</nav>
<? include 'pages/'.$_GET['module'].'/'.$_GET['action'].'.php';?>
</body>
</html>
