let inputs = $('.required');
let dateInput = $("#date");
let yearSelect = $('#yearSelect');
let monthSelect = $("#monthSelect");
let calendarr = $("#calendar");

function validate() {
    let isOK = false;
    inputs.each(function () {
        console.log($(this).attr("id"))
        switch ($(this).attr("id")) {
            case "FIO":
                isOK = CheckFIO($(this));
                break;
            case "phone":
                isOK = CheckPhone($(this));
                break;
            case "texarea":
                isOK = CheckTextArea($(this));
                break;

            default:
                if ($(this).attr("name") == "int") {
                    isOK = CheckForInt(i);
                }

                if (!$(this).val()) {
                    $(`#${numbEl.attr("id") + "f"}`).html("*данное поле обязательно для заполнения");
                    $(this).focus();
                    isOK = false;
                } else {
                    $(`#${$(this).attr("id") + "f"}`).html("");
                }
        }
    })

    return isOK;
}


function enter(id) {
    let message = ""
    switch (id) {
        case "FIO":
            message = "Enter fio"
            break;
        case "phone":
            message = "Enter phone"
            break;
        case "texarea":
            message = "Enter text"
            break;
        default:
            message = "Поле не должно быть пустым"

    }
    $(`#${id + "d"}`).html(message);
    $(`#${id + "d"}`).css({
        "border": "1px solid green",
        "padding-left": "20px",
        "padding-right": "20px"
    })
}

function leave(id) {
    $(`#${id + "d"}`).html("");
    $(`#${id + "d"}`).css({
        border: "0px",
        "padding-left": "0px",
        "padding-right": "0px"
    })
}

function CheckFIO(numbEl) {
    el = numbEl;
    if (el.val().split(' ').length != 3) {
        $(`#${numbEl.attr("id") + "f"}`).html("*должно быть три слова(пробела)");
        el.css({
            "border-color": 'rgb(224 0 0)'
        });
        return false
    }
    $(`#${numbEl.attr("id") + "f"}`).html("");
    el.css({
        "border-color": 'rgb(0 224 0)'
    });
    return true
}

function CheckPhone(numbEl) {
    el = numbEl;
    let re = /^\+[73] ?\(?\d{3}\)?[\- ]?\d{3}[\- ]?\d{2}[\- ]?\d{2}$/;
    if (!re.test(el.val())) {
        $(`#${numbEl.attr("id") + "f"}`).html("*ошибка");
        el.css({
            "border-color": 'rgb(224 0 0)'
        });
        return false
    }
    $(`#${numbEl.attr("id") + "f"}`).html("");
    el.css({
        "border-color": 'rgb(0 224 0)'
    });
    return true
}


function CheckForInt(el) {
    if (el == null)
        return false

    if (/^\d$/.test(el.value) == false) {
        $(`#${numbEl.attr("id") + "f"}`).html("*введите целочисленное значение");
        el.css({
            "border-color": 'rgb(224 0 0)'
        });
        return false;
    }
    $(`#${numbEl.attr("id") + "f"}`).html("");
    el.css({
        "border-color": 'rgb(0 224 0)'
    });
    return true
}

function CheckTextArea(numbEl) {
    el = numbEl;
    if (/[^ ]/.test(el.val()) == false) {
        $(`#${numbEl.attr("id") + "f"}`).html("*заполните это поле");
        el.css({
            "border-color": 'rgb(224 0 0)'
        });
        return false;
    }
    $(`#${numbEl.attr("id") + "f"}`).html("");
    el.css({
        "border-color": 'rgb(0 224 0)'
    });
    return true
}

function setDate() {
    dateInput.val(dayNumb + '.' + monthSelect.val() + '.' + yearSelect.val());
    setDay()
}
