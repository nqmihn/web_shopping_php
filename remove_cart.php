<?php 
    session_start();
    if (empty($_GET['id_product'])){
        header('location:index.php');
        exit;
    }
    $id = $_GET['id_product'];
    echo json_encode($_SESSION['cart'][$id]);
    unset($_SESSION['cart'][$id]);
?>