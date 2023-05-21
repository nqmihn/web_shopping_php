$(document).ready(function() {
    $('.btn-update-quantity').click(function() {
        let btn = $(this)
        let div_parent = btn.closest('.product')
        let quantity = parseInt(div_parent.find('.product-quantity-number').text())
        let type = parseInt(btn.data('type'))
        let id = btn.data('id')
        let line_price = div_parent.find('.product-line-price')
        let price = parseFloat(div_parent.find('.product-price').text())
        $.ajax({
            type: "GET",
            url: "update-quantity.php",
            data: {
                id,
                type
            },
            success: function() {
                if (type === 0) {
                    quantity--
                } else {
                    quantity++
                }
                if (quantity < 1)
                    div_parent.remove()
                else
                    div_parent.find('.product-quantity-number').text(quantity)
                line_price.text(`${quantity*price} `)
                totalPrice()

            }
        });


    });
    $('.remove-product').click(function() {
        let btn = $(this)
        let div_parent = btn.closest('.product')
        let id = btn.data('id')
        $.ajax({
            type: "GET",
            url: "remove_cart.php",
            data: {
                id
            },
            success: function() {
                div_parent.remove()
                totalPrice()
            }
        });
    });
});

function totalPrice() {
    let total = parseFloat(0)
    $('.product-line-price').each(function(index) {
        if (index > 0)
            total += parseFloat($(this).text())

    });
    $('#cart-subtotal').text(total)
    $('#cart-total').text(total)
}