let listLocalStor = $('#listLocalStor');
let listSessionStor = $('#listSessionStor');
let listCookieVisitStor = $('#listCookieVisitStor');


for (let i = 0; i < localStorage.length; ++i) {
    key = localStorage.key(i);

    if (key == "Console/Mode" || key == "Console" || key == "NavigationWidth")
        continue;

    let elementList = $('<p></p>');

    elementList.text(key + ': ' + localStorage[key]);

    listLocalStor.append(elementList);
}

for (let i = 0; i < sessionStorage.length; ++i) {
    key = sessionStorage.key(i);
    if (key == "__prepros-browser-id__" || key == "resolCookie") {
        continue;
    }

    let elementList = $('<p></p>');

    elementList.text(key + ': ' + sessionStorage[key]);

    listSessionStor.append(elementList);
}

for (let i in pages) {
    let elementList = $('<p></p>');

    let count;
    if (getCookie(pages[i]) != undefined)
        count = getCookie(pages[i]);
    else
        count = 0;

    elementList.text(i + ': ' + count);

    listCookieVisitStor.append(elementList);
}
