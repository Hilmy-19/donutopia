<?php
include 'server/connection.php';

if (isset($_POST['register'])) {
    $path = "assets/image/" . basename($_FILES['image']['tmp_name']);
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];

    $user_photo = $_FILES['user_photo']['name'];

    $q_register = "INSERT INTO user VALUES (null, '$user_email', '$user_password', '$user_name', 0, '$user_photo', 'user')";

    $r_register = mysqli_query($conn, $q_register);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        if ($r_register == true) {
            header('location: register.php?success_create_messagge=Account has been created successfully');
        }
    } else {
        header('location: register.php?fail_create_messagge=Could not create account');
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
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
    <title>register</title>
</head>

<body>
    <div class="container">
        <div class="card rounded-5 p-4 w-75 mb-3 regis">
            <div class="card-body">
                <!-- Alert-->
                <?php
                if (isset($_GET['success_create_message'])) {
                    echo '<div id="alert" class="alert alert-success alert-dismissible fade show mt-4" role="alert">Account created successfully!
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else if (isset($_GET['fail_create_message'])) {
                    echo '<div id="alert" class="alert alert-danger alert-dismissible fade show mt-4" role="alert">Account failed to create!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>

                <h5 class="card-title pb-4">Create Your Account</h5>
                <form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-4" name="user_email">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control rounded-4" name="user_password">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Name</label>
                        <input type="text" class="form-control rounded-4" name="user_name">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Photo</label>
                        <input class="form-control rounded-4" type="file" name="user_photo">
                    </div>
                    <a href="login.php" class="ms-3 text-decoration-none">Already have account?</a>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn me-md-4 rounded-4" type="submit" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>