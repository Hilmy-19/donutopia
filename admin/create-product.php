<?php
ob_start();
session_start();
include('layouts/header.php');
include('../server/connection.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
}
?>

<?php
if (isset($_POST['create_btn'])) {
    $path = "images/" . basename($_FILES['image']['name']);
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    // This is image file
    $product_photo = $_FILES['product_photo']['name'];
    

    
    // Upload image
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    
    $query_insert_product = "INSERT INTO products (product_name, product_desc, product_price,
        product_photo) VALUES (?, ?, ?, ?)";

    $stmt_insert_product = $conn->prepare($query_insert_product);

    $stmt_insert_product->bind_param(
        'ssss',
        $product_name,
        $product_desc,
        $product_price,
        $product_photo
    );

    if ($stmt_insert_product->execute()) {
        header('location: product-list.php?success_create_message=Product has been created successfully');
    } else {
        header('location: product-list.php?fail_create_message=Could not create product!');
    }
}
?>

<link rel="stylesheet" href="../assets/css/admin-create-product.css">

<div class="container">
    <h1>Create Product</h1>

    <div class="card rounded-5 p-4 w-75 mb-3 cp">
        <div class="card-body">
            <h5 class="card-title pb-4">Add New Product</h5>
            <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Product Name</label>
                    <input type="text" class="form-control rounded-4" name="product_name">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Product Price</label>
                    <input type="text" class="form-control rounded-4" name="product_price">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control rounded-4" rows="3" name="product_desc"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Product Photo</label>
                    <input class="form-control rounded-4" type="file" name="product_photo">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn me-md-4 rounded-4"  name="create_btn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('layouts/footer.php');
?>