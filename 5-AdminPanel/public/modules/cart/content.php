<? if(isset($_SESSION['cart']) && count($_SESSION['cart'])){?>>
<div class="row">
    <table class="table dense">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($_SESSION['cart'] as $product) {?>
            <tr>
                <td><?=$product['name'];?></td>
                <td>1</td>
                <td>
                    <a href="?module=cart&action=remove&id=<?=$product['id'];?>">x</a>
                </td>
            </tr>
        <? }?>
        </tbody>
    </table>
</div>
<div class="row">
    <form action="?module=cart&action=buy" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter e-mail">
        </div>

        <input type="submit" class="btn btn-primary" value="buy">
    </form>
</div>
<?} else {?>
<div class="alert alert-danger">Cart is empty</div>
    <a href="?module=students&action=read">back</a>
<? }?>
