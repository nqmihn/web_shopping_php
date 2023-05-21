<?php
$email = $_POST['email'];
$password = $_POST['password'];

require '../admin/connect.php';
$sql = "SELECT * from customers
        where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) === 0) {
    header('location:index.php?error=Thông tin đăng nhập sai');
    exit;
} else {
    $user_data = mysqli_fetch_array($result);
    $id = $user_data['id'];
    $name = $user_data['name'];
    session_start();
    $token = uniqid('user_', true);
    $sql_update_token = "UPDATE customers
                        set token = '$token'
                        where id = '$id'";
    mysqli_query($connect, $sql_update_token);
    setcookie('user_login', $token, time() + 60 * 60 * 24 * 30,'/');
    header('location:../index.php');
    mysqli_close($connect);
}
