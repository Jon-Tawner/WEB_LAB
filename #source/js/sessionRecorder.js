if(sessionStorage.Учёба == undefined){
    sessionStorage.setItem('Главная страница', 0);
    sessionStorage.setItem('Обо мне', 0);
    sessionStorage.setItem('Мои интересы', 0);
    sessionStorage.setItem('Учёба', 0);
    sessionStorage.setItem('Фотоальбом', 0);
    sessionStorage.setItem('Контакт', 0);
    sessionStorage.setItem('История просмотров', 0);
    sessionStorage.setItem('Тест', 0);
    sessionStorage.setItem('resolCookie', 0);
    
    localStorage.setItem('Главная страница', 0);
    localStorage.setItem('Обо мне', 0);
    localStorage.setItem('Мои интересы', 0);
    localStorage.setItem('Учёба', 0);
    localStorage.setItem('Фотоальбом', 0);
    localStorage.setItem('Контакт', 0);
    localStorage.setItem('История просмотров', 0);
    localStorage.setItem('Тест', 0);

}

let title = document.querySelector("title");


for(let i = 0 ; i < localStorage.length; ++i){
    if(localStorage.key(i) == title.textContent)
    localStorage[localStorage.key(i)]++;
}

for(let i = 0 ; i < sessionStorage.length; ++i){
    if(sessionStorage.key(i) == title.textContent)
     sessionStorage[sessionStorage.key(i)]++;
}

for(let i in pages){
    if(i == title.textContent)
        setCookie(pages[i],localStorage[i]+'');
}
