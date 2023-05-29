<?php

include('../server/connection.php');

$user_id = $_GET['user_id'];

$query = "DELETE FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header('location: customer.php?success_delete_message=User account has been deleted successfully');
} else {
    header('location: customer.php?fail_delete_message=Could not delete user account!');
}
