$(document).ready(function () {
    function isEmpty(element) {
        return (element.value === "")
    }
    function validateEmpty(selector, msgSelector, check) {
        selector.blur(function (e) {

            if (isEmpty(e.target)) {
                msgSelector.text(`*Vui lòng nhập trường này`)
                selector.addClass('input-warning');
                check = false

            } else {
                msgSelector.text('')
                selector.removeClass('input-warning');
                check = true
            }
        });

    }
    let checkName = true
    let checkAddress = true
    let checkPhone = true
    validateEmpty($('#input-name'), $('#msg-name'), checkName)
    validateEmpty($('#input-address'), $('#msg-address'), checkAddress)
    validateEmpty($('#input-phone'), $('#msg-phone'), checkPhone)
    function checkAll(){
        if (isEmpty(document.querySelector('#input-name'))
            || isEmpty(document.querySelector('#input-phone')) || isEmpty(document.querySelector('#input-address'))){
                return false
            }
        return (checkName && checkPhone && checkAddress)
    }
    $(".checkout").click(function () { 
        return checkAll()
    });
});