<?php
/*echo '<pre>';
print_r($_SESSION);
echo '</pre>';*/

unset($_SESSION['cart'][$_GET['id']]);
?>

<div class="alert alert-success">Removed from cart</div>
<a href="?module=cart&action=content">back to cart</a>
