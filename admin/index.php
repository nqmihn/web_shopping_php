<?php 
    session_start();
    if (isset($_SESSION['level'])){
        header('location:root/index.php');
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
    <center>
        <h1>Đăng nhập admin</h1>
        <?php if (isset($_GET['error'])){ ?>
            <span style="color: red;">*<?php echo $_GET['error']; } ?></span>
        <form action="process_sign_in.php" method="post">
            Tài khoản
            <input type="text" name="username">
            <br>
            Mật khẩu
            <input type="password" name="password">
            <br>
            <button>Đăng nhập</button>
        </form>
		Super Admin:
		<br>
		superadmin 123
		<br>
		Admin:
		<br>
		admin 123
    </center>
</body>
</html>