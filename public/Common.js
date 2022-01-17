$(function(){
     $(".ajaxHtml").each(function () {
        var urlget = $(this).data("url");
        var targetId = $(this).data("target");
        $.ajax({
            url: urlget
        }).done(function (res) {
            $(targetId).html(res);
        });
    })
});
