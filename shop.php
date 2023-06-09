<?php
include 'layouts/header.php';
include('server/connection.php');

$query_products = "SELECT * FROM product";

$stmt_products = $conn->prepare($query_products);
$stmt_products->execute();
$products = $stmt_products->get_result();

if (isset($_POST['btn-add'])) {
    $product_id = $_GET['product_id'];
    $product_amount = $_POST['product_amount'];

    $query = "SELECT * FROM product WHERE product_id = '$product_id'";
    $q_product = mysqli_query($conn, $query);
    $row = mysqli_fetch_object($q_product);

    $_SESSION['cart'][$product_id] = [
        "product_name" => $row->product_name,
        "product_price" => $row->product_price,
        "product_amount" => $product_amount
    ];

    header("location: cart.php");
}
?>

<link rel="stylesheet" href="assets/css/shop.css">

<main>
    <div class="container">
        <img src="assets/image/tagline-shop.png" class="mt-5" width="450px" alt="">

        <div class="row row-cols-1 row-cols-md-4 g-4 mt-3 mb-5">
            <?php foreach ($products as $product) { ?>
                <div class="col">
                    <div class="card h-100 rounded-4 shadow item-shop">
                        <div class="item-img rounded-4">
                            <?php echo "<img class='card-img-top' src= 'assets/image/" . $product['product_photo'] . "'>"; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                            <h6 class="card-title"><?php echo $product['product_price']; ?></h6>
                            <p class="card-text"><?php echo $product['product_desc']; ?></p>

                            <?php if (isset($_SESSION['logged_in'])) { ?>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-buy me-md-2 rounded-4" type="button" data-bs-toggle="modal" data-bs-target="#amountModal<?= $product['product_id'] ?>">Add To Cart</button>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>

                <!-- Amount Modal -->
                <div class="modal fade" id="amountModal<?= $product['product_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add To Cart</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="shop.php?product_id=<?= $product['product_id'] ?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Enter amount of donut</label>
                                        <input type="text" name="product_amount" class="form-control">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="btn-add">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</main>

<?php
include 'layouts/footer.php';
?>