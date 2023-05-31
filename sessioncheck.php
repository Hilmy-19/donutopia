<?php
session_start();

echo $_SESSION['user_id'];

echo $_SESSION['user_email'];
echo $_SESSION['user_password'];
echo $_SESSION['user_name'];
echo $_SESSION['user_saldo'];
echo $_SESSION['user_photo'];
echo $_SESSION['user_role'];
echo $_SESSION['logged_id'];

?>