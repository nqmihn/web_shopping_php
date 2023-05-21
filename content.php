<?php
require 'admin/connect.php';
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    switch ($type) {
        case 1:
            $sql = "SELECT products.* FROM products
            JOIN manufacturers on (manufacturers.id = products.id_manufacturer and manufacturers.name = 'Áo phong 1')";
            break;
        case 2:
            $sql = "SELECT products.* FROM products
            JOIN manufacturers on (manufacturers.id = products.id_manufacturer and manufacturers.name = 'Áo khoác 1')";
            break;
        case 3:
            $sql = "SELECT products.* FROM products
            JOIN manufacturers on (manufacturers.id = products.id_manufacturer and manufacturers.name = 'Khác')";
            break;
        default:
            $sql = "SELECT * FROM products";
            break;
    }
} else {
    $sql = "SELECT * FROM products";
}
$result = mysqli_query($connect, $sql);
$num_of_product_in_page = 30;
$num_of_product = mysqli_num_rows($result);
$pages = ceil($num_of_product / $num_of_product_in_page);
$product_offset = ($page - 1) * $num_of_product_in_page;
$order = '';
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}
switch ($order) {
    case 'asc':
        $sql_view = "SELECT * FROM ($sql) as pd
        order by price asc
        limit $num_of_product_in_page offset $product_offset";
        break;
    case 'desc':
        $sql_view = "SELECT * FROM ($sql) as pd
        order by price desc
        limit $num_of_product_in_page offset $product_offset";
        break;
    default:
        $sql_view = "SELECT * FROM ($sql) as pd
        limit $num_of_product_in_page offset $product_offset";
        break;
}

$result = mysqli_query($connect, $sql_view);
mysqli_close($connect);

?>

</div>
<div class="content">
    <div class="grid">
        <div class="grid__row app-content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category__heading">
                        Loại sản phẩm
                    </h3>
                    <ul class="category-list">
                        <!-- If selected add category-item--active -->
                        <li class="category-item">
                            <a href="?type=2" class="category-item__link" id="category-item-jacket">Áo phong</a>
                        </li>
                        <li class="category-item">
                            <a href="?type=1" class="category-item__link" id="category-item-t-shirt">Áo khoác</a>
                        </li>
                        <li class="category-item">
                            <a href="?type=3" class="category-item__link" id="category-item-pillow">Khác</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="grid__column-10">
                <div class="home-filter">
                    <span class="home-filter__title">Sắp xếp theo</span>
                    <button class="home-filter__btn btn">Phổ biến</button>
                    <button class="home-filter__btn btn btn--primary">Mới nhất</button>
                    <button class="home-filter__btn btn">Bán chạy</button>

                    <div class="select-input">
                        <span class="select-input__label">Giá
                            <?php if(isset($_GET['order'])){ 
                                echo ($order == 'asc')? ': Tăng dần': ': Giảm dần';
                            }?>
                        </span>
                        <i class="select-input__icon fa-solid fa-angle-down"></i>
                        <!-- List option -->
                        <ul class="select-input__list">
                            <li class="select-input__item">
                                <a href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?>&order=asc" 
                                class="select-input__link">Giá: Tăng dần</a>
                            </li>
                            <li class="select-input__item">
                                <a href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?>&order=desc" 
                                class="select-input__link">Giá: Giảm dần</a>
                            </li>
                        </ul>
                    </div>
                    <div class="home-filter__page">
                        <span class="home-filter__page-num">
                            <span class="home-filter__page-current"><?php echo $page ?></span>/<?php echo $pages ?>
                        </span>
                        <div class="home-filter__page-control">
                            <a <?php if ($page > 1) { ?>href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?><?php if (isset($_GET['order'])) { ?>order=<?php echo $_GET['order'] ?>&<?php } ?>page=<?php echo $page - 1 ?>" <?php } ?> class="home-filter__page-btn <?php if ($page == 1) { ?>home-filter__page-btn--disabled<?php } ?> ">
                                <i class="home-filter__page-control-icon fa-solid fa-angle-left"></i>
                            </a>
                            <a <?php if ($page < $pages) { ?>href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?><?php if (isset($_GET['order'])) { ?>order=<?php echo $_GET['order'] ?>&<?php } ?>page=<?php echo $page + 1 ?>" <?php } ?> class="home-filter__page-btn <?php if ($page == $pages) { ?>home-filter__page-btn--disabled<?php } ?>">
                                <i class="home-filter__page-control-icon fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="home-pruduct">
                    <div class="grid__row">
                        <?php foreach ($result as $each) { ?>
                            <div class="grid__column-2-4">
                                <!-- Product item -->
                                <a class="home-product-item" href="product_detail.php?id=<?php echo $each['id']; ?>">
                                    <div class="home-product-item__img" style="background-image: url(<?php echo $each['image']; ?>);">
                                    </div>
                                    <h4 class="home-product-item__name"><?php echo $each['name']; ?> </h4>
                                    <div class="home-product-item__price">
                                        <span class="home-product-item__price-old"><?php echo $each['old_price']; ?>.000đ</span>
                                        <span class="home-product-item__price-current"><?php echo $each['price']; ?>.000đ</span>
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__like home-product-item__like--liked ">
                                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                            <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star-gold fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <span class="home-product-item__sold">77 Đã bán</span>
                                    </div>
                                    <div class="home-product-item__orgin">
                                        <span class="home-product-item__orgin-name">Hồ Chí Minh</span>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fa-solid fa-check"></i>
                                        <span>Yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__sale-off-percent"><?php
                                                                                            $sale = round($each['price'] / $each['old_price'], 2);
                                                                                            echo 100 - $sale * 100;

                                                                                            ?>
                                            %</span>
                                        <span class="home-product-item__sale-off-label">Giảm</span>
                                    </div>
                                </a>

                            </div>
                        <?php } ?>

                    </div>
                </div>
                <ul class="pagination home-pruduct__pagination">

                    <li class="pagination-item">
                        <a <?php if ($page > 1) { ?> href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?>page=<?php echo $page - 1 ?>" <?php } ?> class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <!-- if actived add class pagination-item--actived -->
                    <li class="pagination-item <?php if ($page == 1) { ?>pagination-item--actived<?php } ?>">
                        <a href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?><?php if (isset($_GET['order'])) { ?>order=<?php echo $_GET['order'] ?>&<?php } ?>page=1" class="pagination-item__link">
                            1

                        </a>
                    </li>

                    <?php
                    for (($page <= 5) ? $i = 2 : $i = $page - 3; ($page <= 5) ? $i <= 5 : $i <= $page; $i++) {
                        if ($i <= $pages){
                    ?>
                        <li class="pagination-item <?php if ($i == $page) { ?>pagination-item--actived<?php } ?>">
                            <a href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?><?php if (isset($_GET['order'])) { ?>order=<?php echo $_GET['order'] ?>&<?php } ?>page=<?php echo $i ?>" class="pagination-item__link">
                                <?php
                                echo $i;
                                ?>
                            </a>
                        </li>
                    <?php } }
                    if ($page < $pages && $page >= 5) {
                    ?>
                        <li class="pagination-item <?php if ($i == $page) { ?>pagination-item--actived<?php } ?>">
                            <a href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?><?php if (isset($_GET['order'])) { ?>order=<?php echo $_GET['order'] ?>&<?php } ?>page=<?php echo $page + 1 ?>" class="pagination-item__link">
                                <?php
                                echo $page + 1;
                                ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($pages > 5 && $page <= $pages - 2) { ?>
                        <li class="pagination-item">
                            <a class="pagination-item__link">
                                ...
                            </a>
                        </li>
                    <?php } ?>
                    <li class="pagination-item">
                        <a <?php if ($page < $pages) { ?> href="?<?php if (isset($_GET['type'])) { ?>type=<?php echo $_GET['type'] ?>&<?php } ?><?php if (isset($_GET['order'])) { ?>order=<?php echo $_GET['order'] ?>&<?php } ?>page=<?php echo $page + 1 ?>" <?php } ?> 
                        class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    <?php if (isset($_GET['type'])) { ?>
        $(document).ready(function() {
            switch (parseInt(<?php echo $_GET['type'] ?>)) {
                case 1:
                    ($('#category-item-t-shirt').closest('li')).addClass('category-item--active');
                    break;
                case 2:
                    ($('#category-item-jacket').closest('li')).addClass('category-item--active');
                    break;
                case 3:
                    ($('#category-item-pillow').closest('li')).addClass('category-item--active');
                    break;
                default:
                    break;
            }
        });
    <?php } ?>
</script>