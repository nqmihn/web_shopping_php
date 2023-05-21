<?php
require 'check_login.php';
$email = $_POST['email'];
require 'admin/connect.php';
$sql = "select * from customers
where email='$email'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 0) {
    header('location:forgot_password.php?error=Email không tồn tại');
    exit;
}
$each = mysqli_fetch_array($result);
$id_customer = $each['id'];
$token = uniqid('pw_', true);
$sql_find_id = "select * from forgot_password
where id_customer='$id_customer'";
$check_id = mysqli_query($connect,$sql_find_id);
if (mysqli_num_rows($check_id) !== 0 ){
    $sql_update_token  = "update forgot_password
    set 
    token='$token',
    created_at=CURRENT_TIME()
    where
    id_customer='$id_customer'";
    mysqli_query($connect, $sql_update_token);
} else {
    $sql_insert_token = "INSERT INTO forgot_password(id_customer, token) 
    VALUES ('$id_customer', '$token')";
    mysqli_query($connect, $sql_insert_token);
}
require 'mail.php';
$url = $_SERVER['HTTP_HOST'] . '/change_new_password.php?token=' . $token;
$name = $each['name'];
$subject = 'Đặt lại mật khẩu';
$content = "Chào $name.<a href='$url'>Ấn vào đây để đặt lại mật khẩu của bạn</a>";
send_mail($email, $name, $subject, $content);
header('location:forgot_password.php?success=Mã xác nhận đã được gửi, vui lòng kiểm tra hòm thư của bạn');
