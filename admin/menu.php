<ul>
    <?php if ($_SESSION['level'] == 1){ ?>
    <li>
        <a href="../manufacturers">
            Quản lý nhà sản xuất
        </a>
    </li>
    <?php } ?>
    <li>
        <a href="../products">
            Quản lý sản phẩm
        </a>
    </li>
    <li>
        <a href="../orders">Quản lý đơn hàng</a>
    </li>
    <li>
        <a href="../sign_out.php">Đăng xuất</a>
    </li>
</ul>