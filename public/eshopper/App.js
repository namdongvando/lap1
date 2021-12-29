$(function () {
    $(".cart_quantity_input").change(function () {
        var sl = $(this).val();
        var id = $(this).data("id");
        window.location.href = "/cart/index/capnhatsl/?id=" + id + "&sl=" + sl;

    });

})
    