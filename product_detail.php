<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="assets/css/product_main.css" />
    <link rel="stylesheet" href="assets/css/base.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap&subset=vietnamese" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/font/fontawesome-6.2.1/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="app">
        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            require 'admin/connect.php';
            $sql = "SELECT * from products
                    where id = '$id'";
            $result = mysqli_query($connect, $sql);
            $product_data = mysqli_fetch_array($result);
        } else {
            header('location:index.php');
            exit;
        }
        include 'header.php';

        ?>

        <div class="content">
            <div class="grid">
                <div class="grid__row app-content">
                    <div class="grid__column-4-8">
                        <div class="product-heading">
                            <div class="product-heading__image" style="background-image: url(<?php echo $product_data['image']; ?>);">
                            </div>
                            <div class="product-heading__more">
                                <li class="product-heading__share product-heading__share--separate">
                                    <h2 class="product-heading__share-title">
                                        Chia sẻ:
                                    </h2>
                                    <a href="" class="product-heading__share-icon"><i class="fa-brands fa-facebook-messenger"></i>
                                    </a>
                                    <a href="" class="product-heading__share-icon"><i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="" class="product-heading__share-icon"><i class="fa-brands fa-twitter"></i>
                                    </a>
                                </li>
                                <div class="product-heading__favourite">
                                    <i class="product-heading__favourite--icon fa-regular fa-heart"></i>
                                    <h2 class="product-heading__favourite--liked">Đã thích (369)</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__column-7-2">
                        <div class="product-detail">
                            <span class="product-detail__title"><?php echo $product_data['name'] ?></span>
                            <div class="product-detail__statistics">
                                <a href="" class="product-detail__statistics--rating">
                                    <div class="product-detail__statistics--rating-number">5.0</div>

                                    <i class="product-detail__statics--rating-img fa-solid fa-star"></i>
                                    <i class="product-detail__statics--rating-img fa-solid fa-star"></i>
                                    <i class="product-detail__statics--rating-img fa-solid fa-star"></i>
                                    <i class="product-detail__statics--rating-img fa-solid fa-star"></i>
                                    <i class="product-detail__statics--rating-img fa-solid fa-star"></i>

                                </a>
                                <a href="" class="product-detail__statics--comments">
                                    <span class="product-detail__statics--comments-number">369</span>
                                    Đánh giá
                                </a>

                                <div class="product-detail__statics--sold">
                                    <span class="product-detail__statics--sold-number"><?php echo $product_data['sold'] ?></span>
                                    Đã bán
                                </div>

                            </div>
                            <div class="product-detail__price">
                                <span class="product-detail__price-old-price"><?php echo $product_data['old_price'] ?>.000đ</span>
                                <span class="product-detail__price-new-price"><?php echo $product_data['price'] ?>.000đ</span>
                                <div class="product-detail__price-sale">
                                    <span class="product-detail__price-sale-tittle">
                                        <?php
                                        $sale = round($product_data['price'] / $product_data['old_price'], 2);
                                        echo 100 - $sale * 100;
                                        ?>
                                        % Giảm</span>
                                </div>
                            </div>
                            <li class="product-detail__options">
                                <span class="product-detail__options-title">Size</span>
                                <ul class="product-detail__options-item">
                                    <span class="product-detail__options-item--size">37</span>
                                </ul>
                                <ul class="product-detail__options-item">
                                    <span class="product-detail__options-item--size">38</span>
                                </ul>
                                <ul class="product-detail__options-item">
                                    <span class="product-detail__options-item--size">39</span>
                                </ul>
                                <ul class="product-detail__options-item">
                                    <span class="product-detail__options-item--size">40</span>
                                </ul>
                                <ul class="product-detail__options-item">
                                    <span class="product-detail__options-item--size">41</span>
                                </ul>

                            </li>
                            <div class="product-quantity">
                                <span class="product-quantity-title">Số lượng</span>
                                <div class="product-quantity-control" data-type="0">
                                    <span class="product-quantity-control-icon">-</span>
                                </div>
                                <div class="span-quantity-number">1</div>
                                <div class="product-quantity-control" data-type="1">
                                    <span class="product-quantity-control-icon">+</span>
                                </div>

                            </div>
                            <div class="product-buy">
                                <div class="product-buy__add-to-cart" data-id="<?php echo $product_data['id'] ?>">
                                    <i class="product-buy__add-to-cart-icon fa-solid fa-cart-plus"></i>
                                    <span class="product-buy__add-to-cart-title" data-id="<?php echo $product_data['id'] ?>">
                                        Thêm vào giỏ hàng
                                    </span>
                                </div>
                                <div class="product-buy__now">
                                    <span class="product-buy__now-title">Mua ngay</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="grid__row product__description">
                    <div class="product__description-heading">
                        <div class="product__description-heading--title">Mô tả sản phẩm</div>
                    </div>
                    <p class="product__description-heading--content" style="white-space: pre-line"><?php echo ($product_data['description']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="add_to_cart.js">
        
    </script>
</body>

</html>