<?php

include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: admin/index.php');
    exit;
}

if (isset($_POST['register_btn'])) {
    header('location: register.html');
}


if (isset($_POST['login_btn'])) {
    $email = $_POST['user_email'];
    $password = ($_POST['user_password']);

    $query = "SELECT user_id, user_email, user_password, user_name, user_saldo,
        user_photo FROM user WHERE user_email = ? 
        AND user_password = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $user_id,
            $user_name,
            $user_email,
            $user_password,
            $user_saldo,
            $user_photo
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_password'] = $user_password;
            $_SESSION['user_saldo'] = $user_phone;
            $_SESSION['user_photo'] = $user_photo;
            $_SESSION['logged_in'] = true;


            header('location: admin/index.php?message=Logged in successfully');
        } else {
            header('location: admin/login.php?error=Could not verify your account!');
        }
    } else {
        header('location: login.php?error=Something went wrong!');
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
    <title>donutopia</title>
</head>

<body>
    <div class="container">
        <div class="card login mb-3 rounded-5" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/image/logo-donut.png" width="400px" class="img-fluid rounded-start mt-5 ms-2" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title ms-3">Login</h5>
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-4" name="user_email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control rounded-4" name="user_password">
                            </div>
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