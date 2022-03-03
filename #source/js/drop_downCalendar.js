let calendar = $("#calendar");
let week = $("#week");
let days = $("#days");
let monthGroup = $("#monthGroup");
let yearGroup = $("#yearGroup");
let isCreate = false;
let date = new Date();
var dayNumb = 1;
var TABLE_ELEMENT_LENGHT = 42;

$("#date").focus(function () {
    calendar.css('display', 'block');
    setDay();
})
$("#days").click(function () {
    calendar.hide();
})

for (let i = 0; i < 12; i++) {
    let month = $("<option></option>");
    month.attr("value", i + 1);
    month.text(months[i])
    monthGroup.append(month);
}

for (let i = 1900; i < 2200; i++) {
    let year = $("<option></option>");
    year.attr("value", i);
    year.text(i);
    yearGroup.append(year);
}

for (let i = 0; i < 7; i++) {
    let weekDay = $("<li></li>")
    weekDay.text(weekDays[i])
    week.append(weekDay);
}

for (let i = 1; i <= TABLE_ELEMENT_LENGHT; i++) {
    let day = $("<li></li>");
    day.attr("id", "td-" + i);
    days.append(day);

    if ((i) % 7 == 0)
        days.append($("<br/>"));
}


function setDay() {
    let countday = daysInMonth($("#monthSelect").val(), $("#yearSelect").val());
    let dayNameNumb = new Date($("#yearSelect").val(), $("#monthSelect").val(), 0).getDay();
    let numb = 1;

    for (let i = 1; i <= TABLE_ELEMENT_LENGHT; i++) {
        if (i > dayNameNumb && i <= countday + dayNameNumb) {
            $("#td-" + i).html(numb);
            $("#td-" + i).click(function () {
                dayNumb = i - dayNameNumb;
                setDate();
            })
            numb++;
        }
        else
            $("#td-" + i).html('-');

    }
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}
