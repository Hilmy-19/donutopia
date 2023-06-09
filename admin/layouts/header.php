<?php
include '../server/connection.php';
session_start();

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);
        header('location: ../index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets//css/admin-style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/61f8d3e11d.js" crossorigin="anonymous"></script>
    <title>admin</title>
</head>

<body class="background">
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-3 pt-3 pb-4">
                <img src="../assets/image/logo.png" class="fs-4 ms-4" width="160px" alt="">
                <button class="btn d-md-none d-block close-btn px-1 py-0"><i class="fa-solid fa-bars-staggered"></i></button>
            </div>

            <!-- <hr class="h-color mx-2"> -->

            <ul class="list-unstyled px-2">
                <li class="">
                    <a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-gauge me-2"></i>Dashboard</a>
                </li>
                <li class="">
                    <a href="transaction.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-money-bill me-2"></i>Transaction</a>
                </li>
                <li class="">
                    <a href="#side-menu" data-bs-toggle="collapse" class="text-decoration-none px-3 py-2 d-block text-start me-2" aria-current="page">
                        <i class="fa-solid fa-table"></i>
                        Product
                        <i class="fa fa-caret-down ms-2"></i>
                    </a>
                    <ul class="nav collapse ms-1 flex-column" id="side-menu" data-bs-parent="#menu">
                        <li class="nav-item">
                            <a class="text-decoration-none px-3 py-2 d-block text-start" href="product-list.php">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-decoration-none px-3 py-2 d-block text-start" href="create-product.php">Create Product</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="customer.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-users me-2"></i>Customer</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg shadow-lg" style="background-color: #F5F2D4;">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="assets/image/logo.png" width="140px" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-but dropdown">
                                <a class="nav-link dropdown-toggle me-md-2" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Admin<i class="fa-solid fa-user ms-2"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="../index.php?logout=1">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>