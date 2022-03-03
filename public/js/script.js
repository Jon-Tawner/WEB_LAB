const Anchors = {
    myInterestsNav: {
        docName: "myInterests.html",
        1: { anchName: "hobby_anchor", text: "Моё хобби" },
        2: { anchName: "books_anchor", text: "Мои любимые книги" },
        3: { anchName: "music_anchor", text: "Моя любимая музыка" },
        4: { anchName: "movies_anchor", text: "Мои любимые фильмы" },
    },
};
function getCookie(e) {
    let o = document.cookie.match(new RegExp("(?:^|; )" + e.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") + "=([^;]*)"));
    return o ? decodeURIComponent(o[1]) : void 0;
}
function setCookie(e, o, n = {}) {
    (n = { path: "/", ...n }).expires instanceof Date && (n.expires = n.expires.toUTCString());
    let t = encodeURIComponent(e) + "=" + encodeURIComponent(o);
    for (let e in n) {
        t += "; " + e;
        let o = n[e];
        !0 !== o && (t += "=" + o);
    }
    document.cookie = t;
}
let calendar = document.querySelector(".calendar"),
    week = document.querySelector(".week"),
    days = document.querySelector(".days"),
    monthGroup = document.querySelector(".monthGroup"),
    yearGroup = document.querySelector(".yearGroup"),
    isCreate = !1;
var dayNumb = 1;
function createDDCalendar() {
    if (!isCreate) {
        for (let e = 0; e < 12; e++) {
            let t = document.createElement("option");
            t.setAttribute("value", e + 1), (t.textContent = months[e]), monthGroup.appendChild(t);
        }
        for (let e = 1900; e < 2200; e++) {
            let t = document.createElement("option");
            t.setAttribute("value", e), (t.textContent = e), yearGroup.appendChild(t);
        }
        for (let e = 0; e < 7; e++) {
            let t = document.createElement("li");
            (t.textContent = weekDays[e]), week.appendChild(t);
        }
        for (let e = 0; e < 12; e++) {
            let t = daysInMonth(e, new Date().getFullYear());
            console.log(t);
            for (let e = 1; e <= t; e++) {
                let t = document.createElement("li");
                (t.textContent = e),
                    (t.onclick = function () {
                        (dayNumb = e), setDate();
                    }),
                    days.appendChild(t),
                    e % 7 == 0 && days.appendChild(document.createElement("br"));
            }
        }
    }
    isCreate = !0;
}
function daysInMonth(e, t) {
    return new Date(t, e, 0).getDate();
}
for (const e in Anchors) {
    let t = document.getElementById(e),
        n = document.createElement("div");
    n.setAttribute("class", "DDmenu"), t.appendChild(n);
    for (let t = 1; t < Object.keys(Anchors[e]).length; ++t) {
        let c = document.createElement("a");
        (c.textContent = Anchors[e][t].text), c.setAttribute("href", Anchors[e].docName + "#" + Anchors[e][t].anchName), c.setAttribute("class", "DDmenu"), n.appendChild(c);
    }
}
let inputs = document.querySelectorAll(".required");
let dateInput = document.getElementById("date");
let monthSelect = document.getElementById("monthSelect");
let yearSelect = document.querySelector("#yearSelect");

function validate() {
    isOK = true;
    for (var i = 1; i <= inputs.length; i++) {
        let el = inputs[i - 1];
        switch (el.id) {
            case "FIO":
                isOK = CheckFIO(i);
                break;
            case "phone":
                isOK = CheckPhone(i);
                break;
            case "texarea":
                isOK = CheckTextArea(i);
                break;

            default:
                if (el.getAttribute("name") == "int") isOK = CheckForInt(i);

                if (el.value.length == 0) {
                    document.getElementById(i + 1 + "f").innerHTML = "*данное поле обязательно для заполнения";
                    el.focus();
                    isOK = false;
                } else document.getElementById(i + 1 + "f").innerHTML = "";
        }
    }
    return isOK;
}

function CheckFIO(numbEl) {
    el = inputs[numbEl - 1];
    if (el.value.split(" ").length != 3) {
        document.getElementById(numbEl + "f").innerHTML = "*должно быть три слова(пробела)";
        el.style.borderColor = "rgb(224 0 0)";
        return false;
    }
    document.getElementById(numbEl + "f").innerHTML = "";
    el.style.borderColor = "rgb(0 224 0)";
}

function CheckPhone(numbEl) {
    el = inputs[numbEl - 1];
    let re = /^\+[73] ?\(?\d{3}\)?[\- ]?\d{3}[\- ]?\d{2}[\- ]?\d{2}$/;
    if (!re.test(el.value)) {
        document.getElementById(numbEl + "f").innerHTML = "*ошибка";
        el.style.borderColor = "rgb(224 0 0)";
        return false;
    }
    document.getElementById(numbEl + "f").innerHTML = "";
    el.style.borderColor = "rgb(0 224 0)";
}

function CheckForInt(el, numbEl = -1) {
    if (el == null) el = inputs[numbEl - 1];

    if (/^\d$/.test(el.value) == false) {
        document.getElementById(numbEl + "f").innerHTML = "*введите целочисленное значение";
        el.style.borderColor = "rgb(224 0 0)";
        return false;
    }
    document.getElementById(numbEl + "f").innerHTML = "";
    el.style.borderColor = "rgb(0 224 0)";
}

function CheckTextArea(numbEl) {
    el = inputs[numbEl - 1];
    if (/[^ ]/.test(el.value) == false) {
        document.getElementById(numbEl + "f").innerHTML = "*заполните это поле";
        el.style.borderColor = "rgb(224 0 0)";
        return false;
    }
    document.getElementById(numbEl + "f").innerHTML = "";
    el.style.borderColor = "rgb(0 224 0)";
}

function setDate() {
    dateInput.value = dayNumb + "." + monthSelect.value + "." + yearSelect.value;
}

const images = {
    1: { filename: "15548", name: "Космос!!", alt: "Космос!!" },
    2: { filename: "D2QI41g11Kc", name: "Limbo", alt: "Очень мрачная картина!!" },
    3: { filename: "foto-ustavshij-kot", name: "Моя морда", alt: "Sad cat in a suit" },
    4: { filename: "peyzazhi-les-noch-mlechnyy-put", name: "Млечный Путь", alt: "Млечный Путь" },
    5: { filename: "PicsArt_06-18-01_11_46", name: "Картинка из снов", alt: "Что-то на грани мрачного и вдхновляющего" },
    6: { filename: "PicsArt_08-21-11_18_36", name: "Сказочный лес", alt: "Загадочный лес" },
    7: { filename: "PicsArt_08-23-03_31_09", name: "Розы", alt: "Хммм.." },
    8: { filename: "romb", name: "Какой-то левый ромб", alt: "Рандомный ромб" },
    9: { filename: "sky-g2fa45da2b_1920", name: "Ночное небо", alt: "Ночное небо" },
};
var anchArts = document.querySelectorAll(".anchorArt");
let ulList = document.querySelector(".list");
for (let t = 0; t < anchArts.length; ++t) {
    let e = document.createElement("li"),
        l = document.createElement("a");
    (l.textContent = anchArts[t].textContent), l.setAttribute("href", "#" + anchArts[t].getAttribute("name")), e.setAttribute("class", "element"), ulList.appendChild(e), document.querySelector(".element:last-child").appendChild(l);
}
let album = document.querySelector("#photos"),
    count = 0;
for (let e in images) {
    let t = document.querySelector(".photo__wrapper:last-child"),
        o = document.querySelectorAll(".photo"),
        l = document.createElement("img"),
        i = document.createElement("p"),
        n = document.createElement("div");
    if (
        (n.setAttribute("class", "photo"),
            l.setAttribute("data-key", images[e].filename),
            l.setAttribute("alt", images[e].alt),
            (l.style.width = "150px"),
            (l.style.height = "150px"),
            (l.onclick = function () {
                BigPhotoOpen(!0, l.getAttribute("src"));
            }),
            (l.src = "img/" + images[e].filename + ".jpg"),
            (i.textContent = images[e].name),
            count++ % 4 == 0)
    ) {
        let e = document.createElement("div");
        e.setAttribute("class", "row"), album.appendChild(e);
    }
    t.appendChild(n), o[o.length - 1].appendChild(i), o[o.length - 1].appendChild(l);
}
let backGround_BigPhoto = document.getElementById("BackGround-BigPhoto"),
    bigPhoto = document.getElementById("BigPhoto");
function BigPhotoOpen(e, t) {
    e ? ((backGround_BigPhoto.style.display = "flex"), bigPhoto.setAttribute("src", t), (bigPhoto.style.display = "flex")) : ((backGround_BigPhoto.style.display = "none"), (bigPhoto.style.display = "none"));
}
null == sessionStorage.Учёба &&
    (sessionStorage.setItem("Главная страница", 0),
        sessionStorage.setItem("Обо мне", 0),
        sessionStorage.setItem("Мои интересы", 0),
        sessionStorage.setItem("Учёба", 0),
        sessionStorage.setItem("Фотоальбом", 0),
        sessionStorage.setItem("Контакт", 0),
        sessionStorage.setItem("История просмотров", 0),
        sessionStorage.setItem("Тест", 0),
        localStorage.setItem("Главная страница", 0),
        localStorage.setItem("Обо мне", 0),
        localStorage.setItem("Мои интересы", 0),
        localStorage.setItem("Учёба", 0),
        localStorage.setItem("Фотоальбом", 0),
        localStorage.setItem("Контакт", 0),
        localStorage.setItem("История просмотров", 0),
        localStorage.setItem("Тест", 0));
let title = document.querySelector("title");
for (let e = 0; e < localStorage.length; ++e) localStorage.key(e) == title.textContent && localStorage[localStorage.key(e)]++;
for (let e = 0; e < sessionStorage.length; ++e) sessionStorage.key(e) == title.textContent && sessionStorage[sessionStorage.key(e)]++;
for (let e in pages) e == title.textContent && setCookie(pages[e], localStorage[e] + "");
const weekDays = { 0: "Mon", 1: "Tru", 2: "Wed", 3: "Thu", 4: "Fri", 5: "Sat", 6: "Sun" },
    months = { 0: "January", 1: "February", 2: "March", 3: "April", 4: "May", 5: "June", 6: "July", 7: "August", 8: "September", 9: "October", 10: "November", 11: "December" },
    pages = {
        "Главная страница": "index.html",
        "Обо мне": "aboutMe.html",
        "Мои интересы": "myInterests.html",
        Учёба: "courses.html",
        Фотоальбом: "photoAlbum.html",
        Контакт: "contact.html",
        "История просмотров": "viewingHistory.html",
        Тест: "test.html",
    };
function generateDate() {
    var e = new Date();
    return (
        (e.getDate() < 10 ? "0" + e.getDate() : e.getDate()) +
        "." +
        ((e.getUTCMonth() < 10 ? "0" + e.getUTCMonth() : e.getUTCMonth()) + 1) +
        "." +
        (e.getFullYear() < 10 ? "0" + e.getFullYear() : e.getFullYear()) +
        " " +
        (e.getHours() < 10 ? "0" + e.getHours() : e.getHours()) +
        ":" +
        (e.getMinutes() < 10 ? "0" + e.getMinutes() : e.getMinutes()) +
        ":" +
        (e.getSeconds() < 10 ? "0" + e.getSeconds() : e.getSeconds())
    );
}
function resetTime() {
    console.log("reset")
    document.getElementById("date123").innerText = generateDate()
    setInterval(() => {
        document.getElementById("date123").innerText = generateDate();
    }, 1e3);
}
resetTime();

let listLocalStor = document.querySelector("#listLocalStor"),
    listSessionStor = document.querySelector("#listSessionStor"),
    listCookieVisitStor = document.querySelector("#listCookieVisitStor");
for (let e = 0; e < localStorage.length; ++e) {
    key = localStorage.key(e);
    let t = document.createElement("p");
    (t.textContent = key + ": " + localStorage[key]), listLocalStor.appendChild(t);
}
for (let e = 0; e < sessionStorage.length; ++e) {
    if (((key = sessionStorage.key(e)), "__prepros-browser-id__" == key)) continue;
    let t = document.createElement("p");
    (t.textContent = key + ": " + sessionStorage[key]), listSessionStor.appendChild(t);
}
for (let e in pages) {
    let t,
        o = document.createElement("p");
    (t = null != getCookie(pages[e]) ? getCookie(pages[e]) : 0), (o.textContent = e + ": " + t), listCookieVisitStor.appendChild(o);
}
