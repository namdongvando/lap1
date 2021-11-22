$(function () {
    try {
        $(".btngeneratePassword").click(function () {
            var dataHtml = $(this).data();

            var length = 8,
                    charset = "!@#$%^&*()_+abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                    retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            $(dataHtml.target).val(retVal);
        });

        $(".btn-danger").click(function () {
            return confirm($(this).attr("title"));
        });

        $(".system-alert").hide(5000);

    } catch (e) {
        console.log(e);
    }


});

