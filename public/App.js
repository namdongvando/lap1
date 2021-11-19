$(function () {
    try {
        $(".btn-danger").click(function () {
            return confirm($(this).attr("title"));
        });
        
        $(".system-alert").hide(5000);

    } catch (e) {
        console.log(e);
    }


});

