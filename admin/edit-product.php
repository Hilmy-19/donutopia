<?php
ob_start();
// session_start();
include('layouts/header.php');
include('../server/connection.php');

// if (!isset($_SESSION['admin_logged_in'])) {
//     header('location: login.php');
// }

// if (!isset($_SESSION['admin_logged_in'])) {
    // header('location: login.php');
// }

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query_edit_product = "SELECT * FROM product WHERE product_id = ?";
    $stmt_edit_product = $conn->prepare($query_edit_product);
    $stmt_edit_product->bind_param('i', $product_id);
    $stmt_edit_product->execute();
    $products = $stmt_edit_product->get_result();

    $query_select_product = "SELECT * FROM products WHERE product_id = ?";
    $stmt_select_product = $conn->prepare($query_select_product);
    $stmt_select_product->bind_param('i', $product_id);
    $stmt_select_product->execute();
    $result_select_product = $stmt_select_product->get_result();

    if ($result_select_product->num_rows > 0) {
        $row_select_product = $result_select_product->fetch_assoc();
        $product_name = $row_select_product['product_name'];
        $product_desc = $row_select_product['product_desc'];
        $product_price = $row_select_product['product_price'];
        $product_photo = $row_select_product['product_photo'];
    } else {
        header('location: product-list.php?fail_update_message=Product not found!');
    }
}

    $query_select_product = "SELECT * FROM products WHERE product_id = ?";
    $stmt_select_product = $conn->prepare($query_select_product);
    $stmt_select_product->bind_param('i', $product_id);
    $stmt_select_product->execute();
    $result_select_product = $stmt_select_product->get_result();

    if ($result_select_product->num_rows > 0) {
        $row_select_product = $result_select_product->fetch_assoc();
        $product_name = $row_select_product['product_name'];
        $product_desc = $row_select_product['product_desc'];
        $product_price = $row_select_product['product_price'];
        $product_photo = $row_select_product['product_photo'];
    } else {
        header('location: product-list.php?fail_update_message=Product not found!');
    }

    $query_select_product = "SELECT * FROM products WHERE product_id = ?";
    $stmt_select_product = $conn->prepare($query_select_product);
    $stmt_select_product->bind_param('i', $product_id);
    $stmt_select_product->execute();
    $result_select_product = $stmt_select_product->get_result();

    if ($result_select_product->num_rows > 0) {
        $row_select_product = $result_select_product->fetch_assoc();
        $product_name = $row_select_product['product_name'];
        $product_desc = $row_select_product['product_desc'];
        $product_price = $row_select_product['product_price'];
        $product_photo = $row_select_product['product_photo'];
    } else {
        header('location: product-list.php?fail_update_message=Product not found!');
    }

if (isset($_POST['update_btn'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    if ($_FILES['product_photo']['name'] != "") {
        $path = "images/" . basename($_FILES['product_photo']['name']);
        move_uploaded_file($_FILES['product_photo']['tmp_name'], $path);
        $product_photo = $_FILES['product_photo']['name'];

        // Update product with new photo
        $query_update_product = "UPDATE products SET product_name = ?, product_desc = ?, 
            product_price = ?, product_photo = ? WHERE product_id = ?";

        $stmt_update_product = $conn->prepare($query_update_product);

        $stmt_update_product->bind_param(
            'ssssi',
            $product_name,
            $product_desc,
            $product_price,
            $product_photo,
            $product_id
        );
    } else {
        // Update product without changing the photo
        $query_update_product = "UPDATE products SET product_name = ?, product_desc = ?, 
            product_price = ? WHERE product_id = ?";

        $stmt_update_product = $conn->prepare($query_update_product);

        $stmt_update_product->bind_param(
            'sssi',
            $product_name,
            $product_desc,
            $product_price,
            $product_id
        );
    }

    if ($stmt_update_product->execute()) {
        header('location: product-list.php?success_update_message=Product has been updated successfully');
    } else {
        header('location: product-list.php?fail_update_message=Could not update product!');
    }
}
?>
<link rel="stylesheet" href="../assets/css/admin-create-product.css">

<div class="container">
    <h1>Update Product</h1>

    <div class="card rounded-5 p-4 w-75 mb-3 cp">
        <div class="card-body">
            <h5 class="card-title pb-4">Update Product</h5>
            <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Product Name</label>
                    <input type="text" class="form-control rounded-4" name="product_name" value="<?php echo $product_name; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Product Price</label>
                    <input type="text" class="form-control rounded-4" name="product_price" value="<?php echo $product_price; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control rounded-4" rows="3" name="product_desc"><?php echo $product_desc; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Product Photo</label>
                    <input class="form-control rounded-4" type="file" name="product_photo">
                </div>
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn me-md-4 rounded-4" name="update_btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('layouts/footer.php');
?>