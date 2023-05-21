<?php
session_start();

$id = $_GET['id'];
if (empty($_SESSION['cart'][$id])) {
    require 'admin/connect.php';
    $sql = "SELECT * from products
            where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $data['name'];
    $_SESSION['cart'][$id]['image'] = $data['image'];
    $_SESSION['cart'][$id]['price'] = $data['price'];
    $_SESSION['cart'][$id]['quantity'] = (empty($_GET['quantity'])) ? 1 : $_GET['quantity'];
    mysqli_close($connect);
} else {
    if (empty($_GET['quantity'])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id]['quantity'] += $_GET['quantity'];
    }
}

echo json_encode($_SESSION['cart']);
// unset($_SESSION['cart']);
