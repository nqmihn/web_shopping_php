<?php require '../check_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include '../menu.php';
    include '../connect.php';
    $sql = "select * from manufacturers";
    $result = mysqli_query($connect, $sql);
    ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        Tên
        <input type="text" name="name">
        <br>
        Ảnh
        <input type="text" name="image">
        <br>
        Giá
        <input type="number" name="price">
        <br>
        Chi tiết
        <input type="text" name="description">
        <br>
        Nhà sản xuất
        <select name="id_manufacturer">
            <?php foreach ($result as $each){ ?> 
                <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>    
            <?php }?>
        </select>
        <br>
        <button>Thêm</button>

    </form>
</body>

</html>