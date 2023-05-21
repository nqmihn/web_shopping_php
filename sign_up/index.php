<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div id="wrapper">
        <form action="process_sign_up.php" method="post">
            <fieldset>
                <legend>Register Form</legend>
                <div>
                    <?php if (isset($_GET['error'])){ ?>
                        <span id="msg-error" style="color: red;"><?php echo $_GET['error'];?>!</span>
                        <br>
                    <?php } if (isset($_GET['success'])){ ?>
                        <span id="msg-success" style="color: green;"><?php echo $_GET['success'] ?>!</span>
                        <br> 
                    <?php } ?>
                    <span id="msg-email"></span>
                    <input type="text"  id="input-email" name="email" placeholder="Email"/>
                    
                </div>
                <div>
                    <span id="msg-name"></span>
                    <input type="text" id="input-name" name="name" placeholder="Name"/>
                </div>
                <div>
                    <span id="msg-password"></span>
                    <input type="password" id="input-password" name="password" placeholder="Password"/>
                </div>
                <div>
                    <span id="msg-confirm-password"></span>
                    <input type="password" id="input-confirm-password" name="confirm-password" placeholder="Confirm Password"/>
                </div>
                <div>
                    <span id="msg-phone"></span>
                    <input type="text" id="input-phone" name="phone" placeholder="Your Phone"/>
                </div>
                <div>
                    <span id="msg-address"></span>
                    <textarea name="address" id="input-address" placeholder="Your Address"></textarea>
                </div>    
                <input type="submit" name="submit" id="btn-submit" value="Sign Up"/>
            </fieldset>    
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="main.js"></script>

</body>

</html>