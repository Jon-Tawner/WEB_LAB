null==sessionStorage.Учёба&&(sessionStorage.setItem("Главная страница",0),sessionStorage.setItem("Обо мне",0),sessionStorage.setItem("Мои интересы",0),sessionStorage.setItem("Учёба",0),sessionStorage.setItem("Фотоальбом",0),sessionStorage.setItem("Контакт",0),sessionStorage.setItem("История просмотров",0),sessionStorage.setItem("Тест",0),sessionStorage.setItem("resolCookie",0),localStorage.setItem("Главная страница",0),localStorage.setItem("Обо мне",0),localStorage.setItem("Мои интересы",0),localStorage.setItem("Учёба",0),localStorage.setItem("Фотоальбом",0),localStorage.setItem("Контакт",0),localStorage.setItem("История просмотров",0),localStorage.setItem("Тест",0));let title=document.querySelector("title");for(let e=0;e<localStorage.length;++e)localStorage.key(e)==title.textContent&&localStorage[localStorage.key(e)]++;for(let e=0;e<sessionStorage.length;++e)sessionStorage.key(e)==title.textContent&&sessionStorage[sessionStorage.key(e)]++;for(let e in pages)e==title.textContent&&setCookie(pages[e],localStorage[e]+"");