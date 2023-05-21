<?php require '../check_super_admin.php'; ?>
<?php 
    if (empty($_POST['id'])){
        header('location:form_update.php?error=Phải truyền mã để sửa');
        exit;
    }
    $id = $_POST['id'];
    if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['image'])){
        header("location:form_update.php?id=$id&error=Phải điền đầy đủ thông tin");
        exit;
    }
    require '../connect.php';
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $image = $_POST['image'];
    $sql = "update manufacturers
    set
    name = '$name',
    phone = '$phone',
    address = '$address',
    image = '$image'
    where id = '$id'";

    mysqli_query($connect,$sql);
    header('location:index.php?success=Sửa thành công');
