<?php 
    session_start();
    if (!isset($_SESSION['id'])){
        header('location:../sign_in');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Giỏ hàng</title>
</head>

<body>
    <div class="app">
        <h1>
            <a href="../">
                <span class="shopping-cart-back">Shopee</span>
                Giỏ hàng
            </a>
        </h1>

        <div class="shopping-cart">


            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>
            <?php
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $sum = 0;
                foreach ($cart as $id => $value) {

            ?>

                    <div class="product">
                        <div class="product-image">
                            <img src="<?php echo $value['image'] ?>">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?php echo $value['name'] ?></div>
                            <p class="product-description">Size: XL</p>
                        </div>
                        <div class="product-price"><?php echo $value['price'] ?></div>
                        <div class="product-quantity">
                            <button class="btn-update-quantity" data-type="0" data-id="<?php echo $id ?>">-</button>
                            <span class="product-quantity-number"><?php echo $value['quantity'] ?></span>
                            <button class="btn-update-quantity" data-type="1" data-id="<?php echo $id ?>">+</button>
                        </div>
                        <div class="product-removal">
                            <button class="remove-product" data-id="<?php echo $id ?>">
                                Remove
                            </button>
                        </div>
                        <div class="product-line-price"><?php echo $value['price'] * $value['quantity'];
                                                        $sum += $value['price'] * $value['quantity'];
                                                        ?></div>
                    </div>
                <?php } ?>
                <form action="check_out.php" method="POST">
                    <?php include 'customer_info.php'; ?>
                    <div class="totals">
                        <div class="totals-item">
                            <label>Tổng giá sản phẩm</label>
                            <div class="totals-value" id="cart-subtotal"><?php echo $sum ?></div>
                        </div>
                        <div class="totals-item">
                            <label>Phí vận chuyển</label>
                            <div class="totals-value" id="cart-shipping">0</div>
                        </div>
                        <div class="totals-item totals-item-total">
                            <label>Tổng tiền</label>
                            <div class="totals-value" id="cart-total"><?php echo $sum ?></div>
                        </div>
                    </div>

                    <button class="checkout">Đặt Hàng</button>
                </form>
            <?php } ?>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="update-quantity.js"></script>
    <script src="validate_info.js"></script>

</body>

</html>