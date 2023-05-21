<?php require '../check_admin.php'; ?>
<?php
if (empty($_GET['id'])) {
    header('location:index.php?error=Phải truyền mã để sửa');
    exit;
}
$id = $_GET['id'];
require '../connect.php';
$sql = "delete from products
    where id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success=Xóa thành công');
