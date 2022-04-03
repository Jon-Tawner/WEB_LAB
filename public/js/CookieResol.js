
if (sessionStorage['resolCookie'] == 0) {
    let not = $('#notification')
    not.css("display", 'flex');
    not.animate({
        top: "0",
        bottom: "0",
        left: "0",
        right: "0",
    })
    not.hide()
    not.show("100")

    $("#accept").on("click", function () {
        $("#notification").remove()
        sessionStorage['resolCookie'] = 1
    })
}