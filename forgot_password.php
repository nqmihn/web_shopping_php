<?php include 'check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Quên mật khẩu</h1>
    <?php 
        if (isset($_GET['error'])){
    ?>
    <span style="color: red;"><?php echo $_GET['error'];} ?></span>
    <?php 
        if (isset($_GET['success'])){
    ?>
    <span style="color: green;"><?php echo $_GET['success'];} ?></span>
    <form action="forgot_password_verify.php" method="post">
        Email
        <input type="text" name="email">
        <br>
        <button>Đặt lại mật khẩu</button>
    </form>
</body>
</html>