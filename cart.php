<?php
include 'layouts/header.php';
include 'server/connection.php';

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    unset($_SESSION['cart'][$id]);

    header('location:cart.php');
}

?>

<link rel="stylesheet" href="assets/css/cart.css">

<div class="container">
    <img src="assets/image/my-cart.png" class="cart" alt="">

    <?php if (!empty($_SESSION['cart'])) { ?>

        <table class="content-table rounded-4">
            <thead>
                <tr class="text-center">
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $count = 1;
            $grandtotal = 0;
            foreach ($_SESSION['cart'] as $cart => $val) {
                $subtotal = $val["product_price"] * $val["product_amount"];
            ?>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="nama_mobil" class="form-control text-center my-3" value="<?php echo $val["product_name"] ?>" readonly>
                        </td>
                        <td>
                            <input type="text" name="harga" class="form-control text-center my-3" value="<?php echo $val["product_price"] ?>" readonly>
                        </td>
                        <td>
                            <input type="text" name="warna" class="form-control text-center my-3" value="<?php echo $val["product_amount"] ?>" readonly>
                        </td>
                        <td>
                            <input type="text" name="jumlah" class="form-control text-center my-3" value="<?php echo $subtotal ?>" readonly>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="cart.php?product_id=<?php echo $cart ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php
                $grandtotal += $subtotal;
            } ?>
            <tfoot>
                <th colspan="2" class="text-end">
                    <h5>Grand Total :</h5>
                </th>
                <th class="text-end">
                    <h5><?php echo $grandtotal ?></h5>
                </th>
                <th>&nbsp;</th>
            </tfoot>
        </table>

        <button class="btn btn-lg mt-3 shadow" style="background-color: #7B543E; color:#F5F2D4; margin-left: 1150px;">Checkout</button>

    <?php } else {
        header('location: shop.php');
    } ?>

</div>

</body>

</html>