<?php
    include('layouts/header.php');
    include('../server/connection.php');

    $query_products = "SELECT * FROM products";

    $stmt_products = $conn->prepare($query_products);
    $stmt_products->execute();
    $products = $stmt_products->get_result();
?>


<link rel="stylesheet" href="../assets/css/admin-product-list.css">

<div class="container">
    <h1>Product List</h1>
    <div class="d-grid gap-2 d-md-flex cari">
        <form class="d-flex" role="search">
            <input class="form-control me-2 rounded-4" type="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-4" style="background-color: #7B543E; color: #F5F2D4;" type="submit">Search</button>
        </form>
    </div>

    <table class="content-table rounded-4">
    <?php 
        if (isset($_GET['success_update_message'])) { 
            echo '<div id="alert" class="alert alert-success alert-dismissible fade show mt-4" role="alert">Product berhasil diperbarui!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else if (isset($_GET['fail_update_message'])) {
            echo '<div id="alert" class="alert alert-danger alert-dismissible fade show mt-4" role="alert">Terjadi kesalahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }                                
    ?>
    <?php 
        if (isset($_GET['success_delete_message'])) { 
            echo '<div id="alert" class="alert alert-success alert-dismissible fade show mt-4" role="alert">Product berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else if (isset($_GET['fail_delete_message'])) {
            echo '<div id="alert" class="alert alert-danger alert-dismissible fade show mt-4" role="alert">Terjadi kesalahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }                    
    ?>
    <?php 
        if (isset($_GET['success_create_message'])) { 
            echo '<div id="alert" class="alert alert-success alert-dismissible fade show mt-4" role="alert">Product berhasil ditambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else if (isset($_GET['fail_create_message'])) {
            echo '<div id="alert" class="alert alert-danger alert-dismissible fade show mt-4" role="alert">Terjadi kesalahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }                    
    ?>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>DESC</th>
                <th>PHOTO</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo $product['product_id']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['product_desc']; ?></td>
                <td><?php echo $product['product_price']; ?></td>
                <td class="text-center"><?php echo "<img style='width: 80px; height: 80px;' src= '../assets/image/" . $product['product_photo']."'>"; ?></td>
                <td class="text-center">
                    <a href="edit-product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-info btn-circle">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="delete-product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php
include('layouts/footer.php');
?>