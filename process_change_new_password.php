<?php
    $token = $_POST['token'];
    $password = $_POST['password'];
    require 'admin/connect.php';
    $sql = "select * from forgot_password
    where token='$token'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) === 0){
        header('location:index.php');
        exit;
    }
    $each = mysqli_fetch_array($result);
    $id_customer = $each['id_customer'];
    $sql = "update customers
    set
    password='$password'
    where
    id='$id_customer'";
    mysqli_query($connect,$sql);
    $sql_delete = "delete from forgot_password
    where token='$token'";
    mysqli_query($connect,$sql_delete);
    header('location:forgot_password.php?success=Đặt lại mật khẩu thành công');