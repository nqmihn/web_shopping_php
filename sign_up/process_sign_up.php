<?php
$name = $_POST['name'];
$email = $_POST['email'];
// $password = md5($_POST['password']);
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require '../admin/connect.php';
$sql = "select * from customers
where email = '$email'";
$result = mysqli_query($connect, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    header('location:index.php?error=Email đã được đăng ký');
    exit;
} else {
    $sql = "INSERT INTO customers(name, email, password, phone, address)
    VALUES ('$name', '$email', '$password', '$phone', '$address')";
    mysqli_query($connect,$sql);
    header('location:index.php?success=Đăng ký thành công');
}
mysqli_close($connect);