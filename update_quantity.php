<?php
session_start();
$type = $_GET['type'];
$id = $_GET['id'];
if ($type === '0') {
    if ($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    } else {
        unset($_SESSION['cart'][$id]);
    }
} else {
    $_SESSION['cart'][$id]['quantity']++;
}
header('location:view_cart.php');
