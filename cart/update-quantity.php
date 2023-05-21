<?php
session_start();
if (!isset($_GET['id']) || !isset($_GET['type'])) {
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
$type = $_GET['type'];
$_SESSION['cart'][$id]['quantity'] = (($type == 1) ?  $_SESSION['cart'][$id]['quantity'] + 1 :  $_SESSION['cart'][$id]['quantity'] - 1);
if ($_SESSION['cart'][$id]['quantity'] < 1) {
    unset($_SESSION['cart'][$id]);
}

echo json_encode($_SESSION['cart'][$id]);
