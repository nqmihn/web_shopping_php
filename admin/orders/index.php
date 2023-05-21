<?php include '../check_admin.php'; ?>
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
         $sql = "select orders.*,
         customers.name,
         customers.phone,
         customers.address from orders
         join customers on customers.id = orders.id_customer"; 
         $result = mysqli_query($connect,$sql);
    ?>
    <h1>Quản lý đơn hàng</h1>
    <table border="1" width="100%">
    <tr>
        <th>Mã đơn hàng</th>
        <th>Thời gian tạo</th>
        <th>Tên người nhận</th>
        <th>Thông tin người nhận</th>
        <th>Trạng thái đơn hạng</th>
        <th>Tổng tiền</th>
        <th></th>
    </tr>
    
    <?php foreach ($result as $each){ ?>
        <tr>
            <td><?php echo $each['id'] ?></td>
            <td><?php echo $each['created_at'] ?></td>
            <td><?php echo $each['name_customer'] ?></td>
            <td><?php echo $each['name_customer'] ?>,<?php echo $each['phone_customer'] ?>,<?php echo $each['address_customer'] ?></td>
            <td>
                <?php
                    switch ($each['status_cart']) {
                        case '1':
                            echo "Đang chờ duyệt";
                            break;
                        case '2':
                            echo "Đã duyệt";
                            break;
                        case '3':
                            echo "Đã bị hủy";
                            break;
                    }
                ?>
            </td>
            <td><?php echo $each['total_price'] ?></td>
            <td>
                <a href="detail.php?id=<?php echo $each['id'] ?>">Xem chi tiết</a>
                <br>
                <?php if($each['status_cart']==1){ ?>
                <a href="update.php?id=<?php echo $each['id'] ?>&status=2">Duyệt</a>
                <br>
                <?php }?>
                <?php if($each['status_cart']!=3){ ?>
                <a href="update.php?id=<?php echo $each['id'] ?>&status=3">Hủy</a>
                <?php } ?>
            </td>
        </tr>    
    <?php }?>
    </table>
</body>
</html>