<?php
include 'layouts/header.php';

include('server/connection.php');

    $query_products = "SELECT * FROM product";

    $stmt_products = $conn->prepare($query_products);
    $stmt_products->execute();
    $products = $stmt_products->get_result();
?>

<link rel="stylesheet" href="assets/css/shop.css">

<main>
    <div class="container">
        <img src="assets/image/tagline-shop.png" class="mt-5" width="450px" alt="">

        <div class="row row-cols-1 row-cols-md-4 g-4 mt-3 mb-5">
            <?php foreach ($products as $product) { ?>
            <div class="col">
                <div class="card h-100 rounded-4 item-shop">
                    <div class="item-img rounded-4">
                    <?php echo "<img class='card-img-top' src= 'assets/image/" . $product['product_photo']."'>"; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                        <h6 class="card-title"><?php echo $product['product_price']; ?></h6>
                        <p class="card-text"><?php echo $product['product_desc']; ?></p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-buy me-md-2 rounded-4" type="button">Buy</button>
                        </div>
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