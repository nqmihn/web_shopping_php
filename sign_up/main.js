$(document).ready(function () {
    function isEmpty(element) {
        return (element.value === "")
    }
    function validateEmpty(selector, msgSelector, check) {
        selector.blur(function (e) {

            if (isEmpty(e.target)) {
                msgSelector.text("*Vui lòng nhập trường này")
                selector.addClass('input-warning');
                check = false

            } else {
                msgSelector.text('')
                selector.removeClass('input-warning');
                check = true
            }
        });

    }
    let checkEmail = true
    $('#input-email').blur(function (e) {
        if (isEmpty(e.target)) {
            $('#msg-email').text("*Vui lòng nhập trường này")
            $('#input-email').addClass('input-warning');
            checkEmail = false

        } else {
            let rgx = /^[\w\.]+@([\w-]+\.)+[\w-]{1,}$/gm
            if (rgx.test(e.target.value)) {
                $('#msg-email').text('')
                $('#input-email').removeClass('input-warning');
                checkEmail = true
            }
            else {
                $('#msg-email').text("*Email phải có dạng a@b.c")
                $('#input-email').addClass('input-warning');
                checkEmail = false
            }
        }
    });
    let checkPassword = true
    let checkConfirmPassword = true
    $('#input-password').blur(function (e) {
        if (isEmpty(e.target)) {
            $('#msg-password').text("*Vui lòng nhập trường này")
            $('#input-password').addClass('input-warning');
            checkPassword = false

        } else {
            let rgx = /^[0-9a-zA-Z]{6,}$/gm
            if (rgx.test(e.target.value)) {
                $('#msg-password').text('')
                $('#input-password').removeClass('input-warning');
                checkPassword = true
            }
            else {
                $('#msg-password').text("*Mật khẩu ít nhất 6 ký tự")
                $('#input-password').addClass('input-warning');
                checkPassword = false
            }
        }
        if ($('#input-confirm-password').val() !== "") {
            if ($('#input-confirm-password').val() === $('#input-password').val()) {
                $('#msg-confirm-password').text('')
                $('#input-confirm-password').removeClass('input-warning');
                checkConfirmPassword = true
            }
            else {
                $('#msg-confirm-password').text("*Mật khẩu không giống mật khẩu đã nhập")
                $('#input-confirm-password').addClass('input-warning');
                checkConfirmPassword = false
            }
        }

    });

    $('#input-confirm-password').blur(function (e) {
        if (isEmpty(e.target)) {
            $('#msg-confirm-password').text("*Vui lòng nhập trường này")
            $('#input-confirm-password').addClass('input-warning');
            checkConfirmPassword = false

        } else {
            if (e.target.value === $('#input-password').val()) {
                $('#msg-confirm-password').text('')
                $('#input-confirm-password').removeClass('input-warning');
                checkConfirmPassword = true
            }
            else {
                $('#msg-confirm-password').text("*Mật khẩu không giống mật khẩu đã nhập")
                $('#input-confirm-password').addClass('input-warning');
                checkConfirmPassword = false
            }
        }

    });
    let checkPhone = true
    $('#input-phone').blur(function (e) {
        if (isEmpty(e.target)) {
            $('#msg-phone').text('Vui lòng nhập trường này');
            $('#input-phone').addClass('input-warning');
            checkPhone = false
        } else {
            let rgx_phone = /^(?:0|\+84)[1-9][0-9]{8,9}$/
            if (rgx_phone.test(e.target.value)) {
                $('#msg-phone').text('')
                $('#input-phone').removeClass('input-warning');
                checkPhone = true
            } else {
                $('#msg-phone').text("*Vui lòng nhập đúng số điện thoại")
                $('#input-phone').addClass('input-warning');
                checkPhone = false
            }
        }

    });
    
    let checkName = true
    let checkAddress = true
    validateEmpty($('#input-name'), $('#msg-name'), checkName)
    validateEmpty($('#input-address'), $('#msg-address'), checkAddress)
    function checkAll(){
        if (isEmpty(document.querySelector('#input-email')) || isEmpty(document.querySelector('#input-name')) 
            || isEmpty(document.querySelector('#input-password')) || isEmpty(document.querySelector('#input-confirm-password'))
            || isEmpty(document.querySelector('#input-phone')) || isEmpty(document.querySelector('#input-address'))){
                return false
            }
        return (checkEmail && checkName && checkPassword && checkConfirmPassword && checkPhone && checkAddress)
    }
   
    $("#btn-submit").click(function () { 
        return checkAll()
    });

});