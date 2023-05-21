<?php 
    require '../check_admin.php';
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
    <?php 
        $id_order = $_GET['id'];
        require '../connect.php';
        $sql = "select * from order_product
        join products on products.id = order_product.id_product
        where id_order='$id_order'";
        $result = mysqli_query($connect,$sql);
        $sum = 0;
    ?>
    <table border="1" width="100%">
    <tr>
        <th>Ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>
    <?php foreach ($result as $value){ ?>  
        <tr>
            <td>
                <img src="../products/photos/<?php echo $value['image'] ?>" height="100">
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td>
                    <center><?php echo $value['quantity'] ?></center>
                </td>
                <td>
                    <?php 
                        $sum+= $value['quantity'] * $value['price'];
                        echo $value['quantity'] * $value['price'] 
                    ?>
                </td>
            </td>
        </tr>     
    <?php }?>
    </table>
    <h1>Tổng tiền : <?php echo $sum ?></h1>
    <?php 
        $id = $_SESSION['id'];
        require '../connect.php';
        $sql = "select * from customers
        where id='$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    
</body>
</html>