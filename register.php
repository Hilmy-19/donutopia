<?php
include 'server/connection.php';

if (isset($_POST['register'] )){
    $path ="assets/image/" . basename($_FILES['image']['tmp_name']); 
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];

    $user_photo = $_FILES['user_photo']['name'];

    move_uploaded_file($FILES['image']['tmp_name'], $path);

    $q_register = "INSERT INTO user (user_email, user_password, user_name, user_photo) VALUES (?,?,?,?)";
    
    $stmt_register = $conn->prepare($q_register);

    $stmt_register->bind_param(
        'ss',
        $user_email,
        $user_password,
        $user_name,
        $user_photo
    );

    if ($stmt_register->execute()) 
    header('location: register.php?success_create_messagge=Account has been created successfully');
} else {
    header('location: register.php?fail_create_messagge=Could not create account');


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
                <h5 class="card-title pb-4">Create Your Account</h5>
                <form class="row g-3" action="actionRegis.php" method="post" enctype="multipart/form-data">
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
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn me-md-4 rounded-4" type="submit" name="regis">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>