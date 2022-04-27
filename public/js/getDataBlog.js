function changeBlog(btn) {
    dataBlog = getDataBlog(btn.name);
}

function getDataBlog(blogId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            blogDate = JSON.parse(xhr.responseText);
            let blog = $("#blog" + blogId);
            blog.empty();

            let form = $('<form action="/website/Blog/getDataBlog" target="my-iframe" method="post">')
            blog.append(form);

            let date = $('<input type="text" name="date" value="' + blogDate['date'] + '">');
            let title = $('<input type="text" name="date" value="' + blogDate['title'] + '">');
            let img;
            if (blogDate['img'])
                img = "<div class='photo'> <img class='img' style='height: 200px' src='/website/public/blog/img/" + blogDate['img'] + "'></div>";

            let content = $('<input type="text" name="date" value="' + blogDate['content'] + '">');
            blog.append(date);
            blog.append(title);
            if (img)
                blog.append(img);
            blog.append(content);
        }
    }

    xhr.open("POST", "/website/Blog/getDataBlog");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + blogId);
}