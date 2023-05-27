<?php
ob_start();
session_start();
include('layouts/header.php');
include('../server/connection.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
}


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query_edit_product = "SELECT * FROM products WHERE product_id = ?";
    $stmt_edit_product = $conn->prepare($query_edit_product);
    $stmt_edit_product->bind_param('i', $product_id);
    $stmt_edit_product->execute();
    $products = $stmt_edit_product->get_result();

} else if (isset($_POST['edit_btn'])) {
    $product_id = $_POST["product_id"];
    $path = "images/" . basename($_FILES['image']['name']); 
    $product_name = $_POST["product_name"];
    $product_desc = $_POST["product_desc"];
    $product_price = $_POST["product_price"];
    $product_photo =  $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['name'], $path);
    
    $query_update_status = "UPDATE products SET product_name = ?, product_price = ?,
    product_desc = ?, product_photo = ? WHERE product_id = ?";

    $stmt_update_status = $conn->prepare($query_update_status);
    $stmt_update_status->bind_param('sssss', $product_name, $product_price, $product_desc, $product_photo, $product_id);

    if ($stmt_update_status->execute()) {
        header('location: product-list.php?success_status=Status has been updated successfully');
    } else {
        header('location: product-list.php?fail_status=Could not update product status!');
    }
} else {
    header('location: product-list.php');
    exit;
}
 
    
?>

<link rel="stylesheet" href="../assets/css/admin-create-product.css">

<div class="container">
    <h1>Edit Product</h1>

    <div class="card rounded-5 p-4 w-75 mb-3 cp">
        <div class="card-body">
            <form class="row g-3" method="post" action="" enctype="multipart/form-data">
            <?php foreach ($products as $products) { ?>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Product Name</label>
                    <input type="text" class="form-control rounded-4" name="product_name" value="<?php echo $products['product_name']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Product Price</label>
                    <input type="text" class="form-control rounded-4" name="product_price" value="<?php echo $products['product_price']; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control rounded-4" rows="3" name="product_desc" value="<?php echo $products['product_desc']; ?>"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Product Photo</label>
                    <input class="form-control rounded-4" type="file" name="product_photo">
                </div>
                <?php } ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn me-md-4 rounded-4" name="edit_btn">Simpan perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('layouts/footer.php');
?>