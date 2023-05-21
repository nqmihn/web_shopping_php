<?php 
    require '../check_admin.php';
    $id = $_GET['id'];
    $status = $_GET['status'];
    require '../connect.php';
    $sql = "update orders
    set status_cart='$status'
    where
    id='$id'";
    mysqli_query($connect,$sql);
    header('location:index.php');