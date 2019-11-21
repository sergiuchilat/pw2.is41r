<?
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'is41r');

if(!$_SESSION['userAuthorized'] && $_GET['module'] !== 'authorization'){
  header('Location:?module=authorization&action=login');
}

$userEmail = 'admin@is41r.local';
$userPassword = '1234';

if($_GET['module'] === 'authorization' && $_GET['action'] === 'logout'){
    session_destroy();
    header('Location:?module=authorization&action=login');
}

if(!empty($_POST['email']) && !empty($_POST['password'])){
    if(
        $_POST['email'] === $userEmail
        &&
        $_POST['password'] === $userPassword
    ){
        $_SESSION['userAuthorized'] = true;
    } else {
        $_SESSION['userAuthorized'] = false;
    }

    if($_SESSION['userAuthorized']){
        header('Location:?module=default&action=main');
    }
}

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
<nav>
    <?
    if($_SESSION['userAuthorized']){
        include 'blocks/menu.php';
    }
    ?>
    <div class="container-fluid">
        <? include 'modules/'.$_GET['module'].'/'.$_GET['action'].'.php';?>
    </div>
</nav>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
