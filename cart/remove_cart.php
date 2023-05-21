<?php
session_start();
if (!isset($_GET['id'])) {
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);

