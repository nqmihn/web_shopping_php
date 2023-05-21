<?php
session_start();
if (isset($_COOKIE['user_login'])) {
    $token = $_COOKIE['user_login'];
    include 'admin/connect.php';
    $sql = "SELECT * from customers
                where token = '$token'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_array($result);
        $_SESSION['id'] = $user_data['id'];
        $_SESSION['name'] = $user_data['name'];
    }
}
?>

<header class="header">
    <div class="grid">
        <nav class="header__navbar">
            <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar-item--separate header__navbar-item--show-qr">
                    <a href="" class="header__navbar-item-link header__navbar-item--bold">Mở ứng dụng trên điện
                        thoại</a>
                    <div class="header__qr">
                        <img src="assets/img/qr.png" alt="QR Code" class="header__qr-img">
                        <div class="header__qr-apps">
                            <a href="" class="header__qr-apps-link">
                                <img src="assets/img/appstore.png" alt="" class="header__qr-download-img">
                            </a>
                            <a href="" class="header__qr-apps-link">
                                <img src="assets/img/chplay.png" alt="" class="header__qr-download-img">
                            </a>


                        </div>
                    </div>
                </li>
                <li class="header__navbar-item">
                    <span class="header__navbar-item--no-pointer">Kết nối</span>
                    <a href="" class="header__navbar-icon-link"><i class="header__navbar-icon fa-brands fa-facebook-f"></i></a>
                    <a href="" class="header__navbar-icon-link"><i class="header__navbar-icon fa-brands fa-google"></i></a>

                </li>
            </ul>
            <ul class="header__navbar-list">
                <?php if (empty($_SESSION['id'])) { ?>
                    <li class="header__navbar-item ">
                        <a href="/admin" class="header__navbar-icon-link">
                            Mở giao diện admin
                        </a>

                    </li>
                    <li class="header__navbar-item header__navbar-item--separate">
                        <a href="sign_in" class="header__navbar-item-link header__navbar-item--bold">Đăng nhập</a>
                    </li>
                    <li class="header__navbar-item ">
                        <a href="sign_up" class="header__navbar-item-link header__navbar-item--bold">Đăng ký</a>
                    </li>
                <?php } else {  ?>
                    <li class="header__navbar-item header__navbar-user">
                        <img src="https://i.redd.it/kessoku-band-padorus-v0-5x7xiei0973a1.png?width=930&format=png&auto=webp&s=e932a68630da0eb75bd72a48ae045c9b6b5ae420" alt="" class="header__navbar-user-img">
                        <span class="header__navbar-user-name"><?php echo $_SESSION['name']; ?></span>
                        <ul class="header__navbar-user-menu">
                            <li class="header__navbar-user-item">
                                <a> Tài khoản của tôi </a>
                            </li>
                            <li class="header__navbar-user-item">
                                <a> Địa chỉ của tôi </a>
                            </li>
                            <li class="header__navbar-user-item">
                                <a href="/cart">Đơn mua</a>
                            </li>
                            <li class="header__navbar-user-item header__navbar-user-item--separate">
                                <a href="sign_out.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- Header with search -->
        <div class="header-with-search">
            <div class="header__logo">
                <a href="index.php" class="header__logo-link">
                    <h1 style="color:red">Shopping Web</h1>
                </a>
            </div>
            <div class="header__search">
                <div class="header__search-input-wrap">
                    <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
                    <!-- Search history -->
                    <div class="header__search-history">
                        <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                        <ul class="header__search-history-list">
                            <li class="header__search-history-item">
                                <a href="">Áo khoác diệt tộc</a>
                            </li>
                            <li class="header__search-history-item">
                                <a href="">Áo khoác diệt tộc 1</a>
                            </li>
                            <li class="header__search-history-item">
                                <a href="">Áo khoác diệt tộc 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="header__search-btn">
                    <i class="header__search-btn-icon fas fa-search"></i>
                </button>
            </div>
            <!-- Cart -->
            <div class="header__cart">
                <div class="header__cart-wrap">
                    <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
                    <!-- If no cart: Add class header__cart-list-no-cart -->
                    <span class="header__cart-notice">3</span>
                    <div class="header__cart-list ">
                        <h4 class="header__cart-heading">Giỏ hàng của bạn</h4>
                        <img src="assets/img/no-cart.png" alt="" class="header__cart-no-cart-img">
                        <span class="header__cart-list-no-cart-msg">Giỏ hàng trống</span>

                        <!-- <h4 class="header__cart-heading">Giỏ hàng của bạn</h4> -->
                        <?php if (!empty($_SESSION['cart'])) { ?>
                            <ul class="header__cart-list-item">
                                <?php

                                $cart = $_SESSION['cart'];
                                $count = 0;
                                foreach ($cart as $id => $value) {
                                    $count++;
                                ?>
                                    <li class="header__cart-item">
                                        <img src="<?php echo $value['image'] ?>" alt="" class="header__cart-item-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name"><?php echo $value['name'] ?></h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price"><?php echo $value['price'] ?>.000đ</span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-quantity"><?php echo $value['quantity'] ?></span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-description">
                                                    Màu: Sharingan, Size: XL
                                                </span>
                                                <span class="header__cart-item-remove" data-id="<?php echo $id; ?>">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <a href="cart">
                            <button class="header__cart-view btn btn-primary">Xem giỏ hàng</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    function checkEmptyCart() {
        <?php
        if (empty($_SESSION['cart'])) {
        ?>
            document.querySelector('.header__cart-notice').innerText = '0';
            document.querySelector('.header__cart-list').classList.add("header__cart-list-no-cart");

        <?php } else { ?>
            document.querySelector('.header__cart-notice').innerText = '<?php echo $count; ?>';
            document.querySelector('.header__cart-list').classList.remove("header__cart-list-no-cart");
        <?php } ?>
    }
    checkEmptyCart()
    $('.header__cart-item-remove').click(function() {
        let btn = $(this)
        let id_product = parseInt(btn.data('id'));
        let li_parent = btn.parents('li');
        let quantity = parseInt($('.header__cart-notice').text());
        $.ajax({
            type: "GET",
            url: "remove_cart.php",
            data: {
                id_product
            },
            success: function() {
                li_parent.remove();
                quantity--
                $('.header__cart-notice').text(quantity)
            }
        });

    });
    
</script>