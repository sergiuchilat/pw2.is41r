<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/site.css">
</head>
<body>
    <nav>
        <? include 'blocks/menu.php';?>
    </nav>
    <? include 'pages/'.$_GET['page'].'.php';?>
</body>
</html>
