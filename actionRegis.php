<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    include 'server/connection.php';

    $user_email = $_POST['inputEmail4'];
    $user_password = $_POST['inputPassword4'];
    $user_name = $_POST['inputName'];
    $user_photo = $_FILES['formFile']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($user_photo);
    move_uploaded_file($_FILES["formFile"]["tmp_name"], $target_file);

    
    $query_user = "INSERT INTO users (email, password, name, photo) VALUES ('$user_email', '$user_password', '$user_name', '$user_photo')";

    if (mysqli_query($conn, $query_user)) {
 
        header("Location: login.php");
        exit();
    } else {
 
        header("Location: register.php?error=Registrasi+gagal");
        exit();
    }
}
?>
