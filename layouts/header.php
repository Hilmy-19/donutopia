<?php
include('server/connection.php');
session_start();

if (isset($_SESSION['logged_id'])) {
    $user_photo = $_SESSION['user_photo'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/61f8d3e11d.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="Website Icon" type="png" href="../assets/image/logo-donut.png">
    <title>donutopia</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #D3ECE9;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/image/logo.png" width="140px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#product">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-us">About us</a>
                        </li>
                    </ul>
                    <?php if (!isset($_SESSION['logged_in'])) { ?> 
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-but dropdown">
                                <a class="nav-link dropdown-toggle me-md-2" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"><ion-icon class="icon" name="person-outline"></ion-icon></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="login.php">Login</a>
                                        <a class="dropdown-item" href="register.php">Register</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="nav-but">
                                <a class="nav-link" href="#"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
                            </li> -->
                        </ul>
                    <?php  } else { ?>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-but dropdown">
                                    <a class="nav-link dropdown-toggle me-md-2 mt-1" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                        <img src="assets/image/<?php echo $_SESSION['user_photo']; ?>" width="40px" class="rounded-circle" alt="">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="profile.php">Profile</a>
                                            <a class="dropdown-item" href="index.php?logout=1">Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-but">
                                    <a class="nav-link mt-2" href="cart.php"><ion-icon class="icon" name="bag-outline"></ion-icon></a>
                                </li>
                            </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>