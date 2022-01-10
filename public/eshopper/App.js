$(function () {
    $(".cart_quantity_input").change(function () {
        var sl = $(this).val();
        var id = $(this).data("id");
        window.location.href = "/cart/index/capnhatsl/?id=" + id + "&sl=" + sl;

    });

    var mySlider = $('#sl2').slider();
    mySlider.on('slideStop', function () {
        var value = mySlider.slider('getValue');
        var stringArray = $('#sl2').val().split(","); 
        var giatu = stringArray[0];
        var giaden = stringArray[1];
        window.location.href ="/index/timkiem/?giatu=" + giatu + "&giaden=" + giaden;
    });
})
    