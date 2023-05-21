$(document).ready(function() {
    let quantity = parseInt($('.span-quantity-number').text());
    $('.product-quantity-control').click(function() {

        let btn = $(this)
        let type = parseInt(btn.data('type'))
        if (type === 1) {
            quantity++
        } else {
            if (quantity > 1) {
                quantity--
            }
        }
        $('.span-quantity-number').text(quantity)


    });
    $('.product-buy__add-to-cart').click(function() {
        let btn = $(this)
        let id = btn.data('id');
        $.ajax({
            type: "GET",
            url: "add_to_cart.php",
            data: {
                id,
                quantity
            },
            success: function(response) {
                alert('Thêm thành công')
            }
        });

    });
});