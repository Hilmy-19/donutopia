<?php
include 'layouts/header.php';

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];
$user_saldo = $_SESSION['user_saldo'];
$user_photo = $_SESSION['user_photo'];

$query = "SELECT user_saldo from user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['btn-topup'])) {
    $topup = $_POST['topup'];

    $query = "UPDATE user SET user_saldo = user_saldo + '$topup' WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $query)) {
        $success = true;
    } else {
        $success = false;
    }

    header("location: profile.php?topup=$success");
}

?>

<link rel="stylesheet" href="assets/css/profile.css">

<div class="container">
    <div class="container">
        <div class="card rounded-5 p-4 w-50 mb-3 profile">
            <div class="card-body">
                <a class="card-title pb-4 text-decoration-none btn-back" href="index.php">Back</a>
                <div class="text-center">
                    <img src="assets/image/<?php echo $_SESSION['user_photo']; ?>" class="rounded-circle" width="200px" alt="">
                    <h3 class="mt-3"><?php echo $_SESSION['user_email']; ?></h3>
                </div>
                <div class="mt-5 ms-5">
                    <h4>Name : <?php echo $_SESSION['user_name']; ?></h4>
                    <h4>Balance : <?php echo $row['user_saldo']; ?></h4>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-lg me-md-4 mb-2 rounded-4" type="button" data-bs-toggle="modal" data-bs-target="#topup">Top-Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="topup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Top Up Balance</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="profile.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Enter nominal balance</label>
                            <input type="text" class="form-control" name="topup">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btn-topup">Top Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</body>

</html>