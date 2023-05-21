<?php
$id = $_GET['id'];
session_start();
unset($_SESSION['cart'][$id]);
header('location:view_cart.php');
