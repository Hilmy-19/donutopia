<?php
include('layouts/header.php');

$q_transaksi = "SELECT transaksi_id, transaksi.user_id, user_name, subtotal from transaksi join user on transaksi.user_id = user.user_id";
$result = mysqli_query($conn, $q_transaksi);

?>

<link rel="stylesheet" href="../assets/css/admin-transaction.css">

<div class="container">
    <h1>Transaction</h1>

    <div class="d-grid gap-2 d-md-flex cari">
        <form class="d-flex" role="search">
            <input class="form-control me-2 rounded-4" type="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-4" style="background-color: #7B543E; color: #F5F2D4;" type="submit">Search</button>
        </form>
    </div>

    <table class="content-table rounded-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER ID</th>
                <th>NAME</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['transaksi_id']; ?></td>
                <td><?= $row['user_id']; ?></td>
                <td><?= $row['user_name']; ?></td>
                <td><?= $row['subtotal']; ?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>

</div>

<?php
include('layouts/footer.php');
?>