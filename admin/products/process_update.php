<?php require '../check_admin.php'; ?>
<?php
if (empty($_POST['id'])) {
    header('location:form_update.php?error=Phải truyền mã để sửa');
    exit;
}
$id = $_POST['id'];
if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description'])) {
    header("location:form_update.php?id=$id&error=Phải điền đầy đủ thông tin");
    exit;
}
require '../connect.php';

$name = $_POST['name'];
$image = $_FILES['image_new'];
$price = $_POST['price'];
$description = $_POST['description'];
$id_manufacturer = $_POST['id_manufacturer'];

if ($image['size'] > 0) {
    $folder = 'photos/';
    $file_extension = explode('.', $image['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($image["tmp_name"], $path_file);
} else {
    $file_name = $_POST['image_old'];
}


require '../connect.php';

$sql = "update products
set
name='$name',
image='$file_name',
price='$price',
description='$description',
id_manufacturer='$id_manufacturer'
where
id ='$id' 
";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php?success=Sửa thành công');
