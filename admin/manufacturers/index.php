<?php require '../check_super_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../menu.php' ?>
    <h1>Quản lý nhà sản xuất</h1>
    <button>
    <a href="form_insert.php">Thêm</a>
    </button>
    <?php 
        include '../connect.php';
        $sql_manufacturers = "select * from manufacturers";
        $number_of_manufacturers = mysqli_num_rows(mysqli_query($connect,$sql_manufacturers));
        $number_of_manufacturers_in_page = 4;
        $pages = ceil($number_of_manufacturers/$number_of_manufacturers_in_page);
        $page = 1;
        if (isset($_GET['page']))
            $page = $_GET['page'];
        $ignore =$number_of_manufacturers_in_page*($page-1);
        $sql = "select * from manufacturers
        limit $number_of_manufacturers_in_page offset $ignore";
        $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ảnh</th>
            <th>Điều chỉnh</th>
        </tr>
        <?php foreach ($result as $each ){ ?> 
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['name'] ?></td>
            <td><?php echo $each['address'] ?></td>
            <td><?php echo $each['phone'] ?></td>
            <td>
            <img src="<?php echo $each['image'] ?>" width="100">
            </td>
            <td>
                <button><a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a></button>
                <button><a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a></button>
            </td>
        </tr>    
        <?php }?>

    </table>
    Trang
       <?php for ($i = 1; $i <= $pages; $i++) { ?>
        <a href="?page=<?php echo $i ?>">
            <?php echo $i ?>
        </a>

    <?php } ?>
   
</body>
</html>