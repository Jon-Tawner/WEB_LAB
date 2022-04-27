function isExists(login) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText != '')
                alert(xhr.responseText);
        }
    }

    xhr.open("POST", "/website/Account/checkLogin");
    xhr.setRequestHeader("Content-type", "text/plain");
    xhr.send(login);
}