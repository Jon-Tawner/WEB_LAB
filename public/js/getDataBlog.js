/*
Боже, Прости меня за сии ошибки в речи моей, а особливо за костыли в коде моему.
ИХ СЛИшком МНОГО!!! 
Речи программиста - 42 глава: 
    Работает - Не трожь!!!!
*/

let form;
let blog;

function getDataBlog(btnId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            blogDate = JSON.parse(xhr.responseText);
            blog = $("#blog" + btnId.name);
            blog.empty();

            form = $('<form action="/website/Blog/saveChangeBlog" target="myFrame" method="post"  enctype="multipart/form-data">')
            blog.append(form);

            let id = $('<input style="display: none" type="text" name="id" value="' + btnId.name + '">');
            let date = $('<input type="text" name="date" value="' + blogDate['date'] + '">');
            let title = $('<input type="text" name="title" value="' + blogDate['title'] + '">');
            let img = $('<p>Выберите картинку: <input type="file" name="img" ></p>');
            let content = $('<textarea cols="50" rows="10" type="text" name="content">' + blogDate['content'] + '</textarea>');
            let btnSave = $('<input type="button" onclick="saveChangeBlog()" value="Save change">');

            form.append(id);
            form.append(date);
            form.append(title);
            form.append(img);
            form.append(content);
            form.append(btnSave);
        }
    }

    xhr.open("POST", "/website/Blog/getDataBlog");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + btnId.name);
}

function saveChangeBlog() {
    let iframe = document.createElement("iframe");
    $(iframe).attr('name', 'myFrame');
    $(iframe).attr('style', 'display: none;');
    $(iframe).on('load', function () {
        let result = this.contentWindow.document.body.innerHTML//JSON.parse(this.contentWindow.document.body.innerHTML);
        if (result != "") {
            document.body.removeChild(iframe);
            blog.empty();
            blog.append(result);
        }

    })
    document.body.append(iframe);
    form.submit();
}