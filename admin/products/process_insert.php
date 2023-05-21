<?php require '../check_admin.php'; ?>
<?php
if(empty($_POST['name']) || empty($_POST['image']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['id_manufacturer'])){
    header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
    exit;
}
require '../connect.php';
$name = $_POST['name'];
$image = $_POST['image'];
$price = $_POST['price'];
$description = $_POST['description'];
$id_manufacturer = $_POST['id_manufacturer'];



$sql = "INSERT INTO products(name, image, price, description, id_manufacturer) 
VALUES ('$name', '$image', '$price', '$description', '$id_manufacturer')";
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:form_insert.php?success=Thêm thành công');