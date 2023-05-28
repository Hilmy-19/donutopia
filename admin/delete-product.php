<?php
include '../server/connection.php';

$product_id = $_GET["product_id"];

$query = "DELETE FROM products WHERE product_id = '$product_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header('location: product-list.php?success_delete_message=Product has been created successfully');
} else {
    header('location: product-list.php?fail_delete_message=Could not create product!');
}


