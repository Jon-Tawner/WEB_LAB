function showComments(btn) {
    // fetch("/website/Blog/getComments", {
    //     method: 'POST',
    //     headers: {
    //         "Content-type": "application/x-www-form-urlencoded"
    //     },
    //     body: "blogId=" + btn.name
    // }).then(response => {
    //     console.log(response.text()); //!!!!Почему ты не промис?
    //     return response.text();

    // }).then(html => {
    //     var parser = new DOMParser();
    //     var doc = parser.parseFromString(html, "text/html");
    //     console.log(doc);
    //     // let blogComments = $(".comments" + btn.name);
    //     // blogComments.empty();
    //     // blogComments.append(html);

    // }).catch(alert('Error!'));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText != '') {
                let blogComments = $(".comments" + btn.name);
                blogComments.empty();
                blogComments.append(xhr.responseText);
            }
        }
    }

    xhr.open("POST", "/website/Blog/getComments");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("blogId=" + btn.name);

}

function hideComments(blog) {
    let blogComments = $(".comments" + blog.name);
    blogComments.empty();
}

