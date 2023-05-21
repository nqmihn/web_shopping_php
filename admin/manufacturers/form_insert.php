<?php require '../check_super_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà sản xuất</title>
</head>
<body>
    <center>
    <form action="process_insert.php" method="post">
        Tên
        <input type="text" name="name">
        <br>
        Số điện thoại 
        <input type="text" name="phone" >
        <br>
        Địa chỉ
        <textarea name="address"></textarea>
        <br>
        Ảnh
        <input type="text" name="image">
        <br>
        <button>Thêm</button>
    </form>
    </center>
</body>
</html>