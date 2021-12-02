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
    try {


        $(".editor").each(function (index, el) {
            CKEDITOR.replace($(this).attr("id"), {
                height: "300px"
            });
        });
        $(".editorContent").each(function (index, el) {
            CKEDITOR.replace($(this).attr("id"), {
                height: "500px"
            });
        });

    } catch (e) {
        console.log(e);
    }

});

function BrowseServer(idInput)
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = function (fileUrl) {
        document.getElementById(idInput).value = fileUrl;
    };
    finder.popup();

    // It can also be done in a single line, calling the "static"
    // popup( basePath, width, height, selectFunction ) function:
    // CKFinder.popup( '../', null, null, SetFileField ) ;
    //
    // The "popup" function can also accept an object as the only argument.
    // CKFinder.popup( { basePath : '../', selectActionFunction : SetFileField } ) ;
}