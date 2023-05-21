<?php
$username = $_POST['username'];
$password = $_POST['password'];

require 'connect.php';
$sql = "select * from admin
where username='$username' and password='$password'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) == 0){
    header('location:index.php?error=Thông tin đăng nhập sai');
    exit;
}
session_start();
$each = mysqli_fetch_array($result);
$_SESSION['id'] = $each['id'];
$_SESSION['name'] = $each['name'];
$_SESSION['level'] = $each['level'];
header('location:root/index.php');