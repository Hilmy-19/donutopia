<?php
include('layouts/header.php');
include('../server/connection.php');

$q_customer = "SELECT * FROM user WHERE user_role = 'user'";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $q_customer .= " AND user_email LIKE '%$search%' OR user_name LIKE '%$search%'";
}

$stmt_customer = $conn->prepare($q_customer);
$stmt_customer->execute();
$customers = $stmt_customer->get_result();
?>

<link rel="stylesheet" href="../assets/css/admin-product-list.css">

<div class="container">
    <h1>Customer</h1>

    <div class="d-grid gap-2 d-md-flex cari">
        <form class="d-flex" role="search" method="GET">
            <input class="form-control me-2 rounded-4" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-4" style="background-color: #7B543E; color: #F5F2D4;" type="submit">Search</button>
        </form>
    </div>

    <?php 
        if (isset($_GET['success_delete_message'])) { 
            echo '<div id="alert" class="alert alert-success alert-dismissible fade show mt-4" role="alert">User account has been deleted!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else if (isset($_GET['fail_delete_message'])) {
            echo '<div id="alert" class="alert alert-danger alert-dismissible fade show mt-4" role="alert">Could not delete user account
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }                    
    ?>

    <table class="content-table rounded-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>NAME</th>
                <th class="text-center">PHOTO</th>
                <th class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) { ?>
                <tr>
                    <td><?php echo $customer['user_id']; ?></td>
                    <td><?php echo $customer['user_email']; ?></td>
                    <td><?php echo $customer['user_name']; ?></td>
                    <td class="text-center"><?php echo "<img style='width: 60px;' src= '../assets/image/" . $customer['user_photo'] . "'>"; ?></td>
                    <td class="text-center">
                        <a href="delete-customer.php?user_id=<?php echo $customer['user_id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
include('layouts/footer.php');
?>