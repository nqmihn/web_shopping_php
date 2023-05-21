<?php require '../check_super_admin.php'; ?>
<?php  
    if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['image'])){
        header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
        exit;
    }
    require '../connect.php';
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $image = $_POST['image'];

    $sql = "insert into manufacturers(name,phone,address,image)
    values('$name','$phone','$address','$image')";

    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:form_insert.php?success=Thêm thành công');
    