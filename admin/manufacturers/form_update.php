<?php require '../check_super_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin</title>
</head>
<body>
    <?php 
        if (!isset($_GET['id'])){
            header('location:index.php?error=Phải truyển mã để sửa');
            exit;
        }
        $id = $_GET['id'];
        include '../menu.php';
        include '../connect.php';
        $sql= "select * from manufacturers
        where id='$id'";
        $result = mysqli_fetch_array(mysqli_query($connect,$sql));
    ?>
    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $result['name'] ?>">
        <br>
        Số điện thoại
        <input type="text" name="phone" value="<?php echo $result['phone'] ?>">
        <br>
        Địa chỉ
        <textarea name="address"><?php echo $result['address'] ?></textarea>
        <br>
        Ảnh
        <input type="text" name="image" value="<?php echo $result['image'] ?>">
        <br>
        <button>Sửa</button>
    </form>
</body>
</html>