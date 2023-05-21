<?php 
include 'check_login.php';
$email = $_POST['email'];
require 'admin/connect.php';
$sql = "select * from customers
where email='$email'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) == 0){
    header('location:forgot_password.php?error=Email không tồn tại');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gửi mã xác nhận</h1>
    <form action="process_forgot_password.php" method="post">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        Email
        <input type="text"  value="<?php echo $email ?>" disabled>
        <br>
        <button>Gửi mã xác nhận</button>
    </form>
</body>
</html>




