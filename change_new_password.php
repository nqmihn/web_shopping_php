<?php
$token = $_GET['token'];
require 'admin/connect.php';
$sql = "select * from forgot_password
    where token='$token'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) === 0) {
    header('location:index.php');
}

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
        <span id="check-all"></span>
        <form action="process_change_new_password.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token ?>">
            Mật khẩu mới
            <input type="password" name="password" onkeyup="check_password()" id="input-password">
            <input type="checkbox" onclick="showPassword();">
            Hiện
            <span id="msg-password"></span>
            <br>
            Nhập lại mật khẩu
            <input type="password" id="confirm-password" onkeyup="check_confirm_password()">
            <span id="msg-confirm-password"></span>
            <br>
            <button onclick="return check()">Đặt lại mật khẩu</button>
        </form>
    
    <script type="text/javascript">
        function showPassword() {
            var x = document.getElementById("input-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        let ok_pw = true;
        let ok_confirm_pw = true;
        const check_password = () => {
            // Phải có ít nhất 8 kí tự chữ và số, có ít nhất 1 chữ 1 số 1 chữ in hoa, không có kí tự đặc biệt
            // let rgx_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/; 
            let rgx_password = /^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/;
            if (!rgx_password.test(document.getElementById('input-password').value)) {
                document.getElementById('msg-password').style.color = 'red';
                document.getElementById('msg-password').innerText = 'Mật khẩu phải nhiều hơn 8 kí tự, phải có ít nhất 1 chữ hoặc số, không có ký tự đặc biệt';
                ok_pw = false;
            } else {
                document.getElementById('msg-password').innerText = '';
                ok_pw = true;
            }
           
        }
        const check_confirm_password = () => {
        if (document.getElementById('input-password').value != document.getElementById('confirm-password').value) {
                document.getElementById('msg-confirm-password').style.color = 'red';
                document.getElementById('msg-confirm-password').innerText = 'Không giống mật khẩu đã nhập'
                ok_confirm_pw = false;
            } else {
                document.getElementById('msg-confirm-password').innerText = '';
                ok_confirm_pw = true;
            }
        }
        function check() {
            if (document.getElementById('input-password').value === '') {
                document.getElementById('check-all').style.color = 'red';
                document.getElementById('check-all').innerText = 'Vui lòng điền đầy đủ thông tin'
                return false;
            } else
            if (!ok_pw || !ok_confirm_pw) {
                document.getElementById('check-all').style.color = 'red';
                document.getElementById('check-all').innerText = 'Vui lòng điền thông tin đúng theo yêu cầu'
                return false;
            } else {
                return true;
            }
        }
    </script>

</body>

</html>