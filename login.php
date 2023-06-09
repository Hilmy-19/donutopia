<?php
session_start();
include('server/connection.php');



if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "SELECT * FROM user WHERE user_email = ? AND user_password = ? LIMIT 1";
    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $user_email, $user_password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $user_id,
            $user_email,
            $user_password,
            $user_name,
            $user_saldo,
            $user_photo,
            $user_role
        );

        $stmt_login->store_result();
        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_password'] = $user_password;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_saldo'] = $user_saldo;
            $_SESSION['user_photo'] = $user_photo;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['logged_in'] = true;

            if ($_SESSION['user_role'] == "user") {
                header("location: index.php?login=1");
            } else if ($_SESSION['user_role'] == "admin") {
                header("location: admin/index.php?login=1");
            } else {
                $success = false;
                header("location: login.php?logined=$success");
            }
        } else {
            $success = false;
            header("location: login.php?logined=$success");
        }
    } else {
        $success = false;
        header("location: login.php?logined=$success");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>login</title>
</head>

<body>
    <div class="container">
        <div class="card item-shop login mb-3 rounded-5" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 mt-2">
                    <a href="index.php" class="text-decoration-none ms-4" style="color: #7B543E;">back</a>
                    <img src="assets/image/logo-donut.png" width="400px" class="img-fluid rounded-start mt-4 ms-2" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title ms-3">Login</h5>
                        <form method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-4" name="user_email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control rounded-4" name="user_password" placeholder="Password">
                            </div>
                            <a href="register.php" class="ms-3 text-decoration-none">Not have an account?</a>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn me-md-2 rounded-4" type="submit" name="login">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>