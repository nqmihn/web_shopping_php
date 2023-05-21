<?php
    session_start();
    if (empty($_SESSION['id']) || empty($_SESSION['cart'])){
        header('location:../index.php');
        exit;
    }
    $id_customer = $_SESSION['id'];
    $name_customer = $_POST['name'];
    $phone_customer = $_POST['phone'];
    $address_customer = $_POST['address'];
    $cart = $_SESSION['cart'];
    $sum = 0;
    foreach ($cart as $value ) {
        $sum+= $value['quantity'] * $value['price'];
    }
    require '../admin/connect.php';
    $sql = "INSERT INTO orders(id_customer, name_customer, phone_customer, address_customer, total_price) 
    VALUES ('$id_customer', '$name_customer', '$phone_customer', '$address_customer', '$sum')";
    mysqli_query($connect,$sql);

    $sql_get_max_id = "SELECT max(id) from orders ";
    $result = mysqli_query($connect,$sql_get_max_id);
    $id_order = mysqli_fetch_array($result)['max(id)'];
    foreach ($cart as $id_product => $value) {
        $price = $value['price'];
        $quantity = $value['quantity'];
        $sql = "INSERT INTO order_product(id_order, id_product, price, quantity) 
        VALUES ('$id_order', '$id_product', '$price', '$quantity')";
        mysqli_query($connect,$sql);
    }
unset($_SESSION['cart']);
header('location:../index.php?success=Đặt hàng thành công');
mysqli_close($connect);