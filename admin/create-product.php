<?php
include('layouts/header.php');
?>

<link rel="stylesheet" href="../assets/css/admin-create-product.css">

<div class="container">
    <h1>Create Product</h1>

    <div class="card rounded-5 p-4 w-75 mb-3 cp">
        <div class="card-body">
            <h5 class="card-title pb-4">Add New Product</h5>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Product Name</label>
                    <input type="text" class="form-control rounded-4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Product Price</label>
                    <input type="text" class="form-control rounded-4">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control rounded-4" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Product Photo</label>
                    <input class="form-control rounded-4" type="file">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn me-md-4 rounded-4" type="button">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('layouts/footer.php');
?>