function generateDate() {
    var date = new Date(),
        day = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate(),
        month = (date.getUTCMonth() < 10) ? '0' + date.getUTCMonth() : date.getUTCMonth(),
        year = (date.getFullYear() < 10) ? '0' + date.getFullYear() : date.getFullYear(),
        hours = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours(),
        minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes(),
        seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
    let textNode = day + '.' + (Number(month) + 1) + '.' + year + ' ' + hours + ':' + minutes + ':' + seconds;
    return textNode;
}

function resetTime() {
    $(".date-time").text(generateDate());
    setInterval(() => {
        $(".date-time").text(generateDate());
    }, 1000)
}
resetTime();