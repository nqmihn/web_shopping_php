<?php require '../check_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <?php 
        include '../menu.php'; 
        include '../connect.php';
        $sql_products = "select * from products";
        $number_of_products = mysqli_num_rows(mysqli_query($connect,$sql_products));
        $number_of_products_in_page = 8;
        $pages = ceil($number_of_products/$number_of_products_in_page);
        $page = 1;
        if (isset($_GET['page']))
            $page = $_GET['page'];
        $ignore =$number_of_products_in_page*($page-1);
        $sql = "select products.*,
                manufacturers.name as manu_name
                from products
                join manufacturers on manufacturers.id = products.id_manufacturer
                limit $number_of_products_in_page offset $ignore"; 
        $result = mysqli_query($connect,$sql);
        
    ?>
    <h1>Manage products</h1>
    <button>
        <a href="form_insert.php">Thêm</a>
    </button>
    <table border="1" width="100%">
    <tr>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Nhà sản xuất</th>
        <th>Điều chỉnh</th>
    </tr>
    
    <?php foreach ($result as $each){ ?>
        <tr>
            <td><?php echo $each['name'] ?></td>
            <td><img src="<?php echo $each['image'] ?>" width="100" ></td>
            <td><?php echo $each['price'] ?></td>
            <td><?php echo $each['description'] ?></td>
            <td><?php echo $each['manu_name'] ?></td>
            <td>
                <button><a href="form_update.php?id=<?php echo $each['id'] ?>">Cập nhật</a></button>
                <button><a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a></button>
            </td>
        </tr>    
    <?php }?>
    </table>
    Trang
       <?php for ($i = 1; $i <= $pages; $i++) { ?>
        <a href="?page=<?php echo $i ?>" style="text-decoration: none;">
            <?php echo $i ?>
        </a>

    <?php } ?>
    
   
</body>
</html>