<?php 
    session_start();
    if (isset($_COOKIE['remember_login'])){
        $token = $_COOKIE['remember_login'];
        require 'admin/connect.php';
        $sql = "select * from customers
        where token = '$token'";
        $result = mysqli_fetch_array(mysqli_query($connect,$sql));
        $number_rows = mysqli_num_rows(mysqli_query($connect,$sql));
        if ($number_rows == 1){
        $_SESSION['id'] = $result['id'];
        $_SESSION['name'] = $result['name'];
    }
    }
    if (isset($_SESSION['id'])){
        header('location:index.php');
        exit;
    }
?>