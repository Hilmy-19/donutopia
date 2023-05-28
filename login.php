<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location:index.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $akun_email = $_POST['akun_email'];
    $akun_password = $_POST['akun_password'];

    $query = "SELECT * FROM akun where akun_email = ? AND akun_password = ? LIMIT 1";
    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $akun_email, $akun_password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $akun_id,
            $akun_email,
            $akun_name,
            $akun_password,
            $akun_role,
            $photo,
            $akun_saldo
        );

        $stmt_login->store_result();
        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['akun_id'] = $akun_id;
            $_SESSION['akun_email'] = $akun_email;
            $_SESSION['akun_name'] = $akun_name;
            $_SESSION['akun_password'] = $akun_password;
            $_SESSION['akun_role'] = $akun_role;
            $_SESSION['photo'] = $photo;
            $_SESSION['akun_saldo'] = $akun_saldo;
            $_SESSION['logged_in'] = true;

            if ($_SESSION['akun_role'] == "user") {
                header("location:index.php?login=1");
            } else if ($_SESSION['akun_role'] == "admin") {
                header("location:admin/index.php?login=1");
            } else {
                header("location:login.php?error=email atau password salah!");
            }
        } else {
            header("location:login.php");
        }
    } else {
        header("location:login.php?");
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
                <div class="col-md-4">
                    <img src="assets/image/logo-donut.png" width="400px" class="img-fluid rounded-start mt-5 ms-2" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title ms-3">Login</h5>
                        <form method="post">
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-4" name="akun_email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control rounded-4" name="akun_password">
                            </div>
                            <a href="register.php" class="ms-3 text-decoration-none">Not have an account?</a>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn me-md-2 rounded-4" type="submit" id="login-btn" name="login_btn">LOGIN</button>
                            </div>
                            <div class="daftar">
                                <a href="register.php"> Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>