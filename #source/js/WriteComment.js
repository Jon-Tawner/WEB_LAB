var btnWithIdBlog;
var modal = document.getElementById("modal");
var Modalcontent = document.getElementById("Modalcontent");

function openModal(btn) {
    btnWithIdBlog = btn;
    modal.style.display = "block";
}

function createModal() {
    var span = document.getElementById("close");

    span.onclick = function () {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function sendComment() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            showComments(btnWithIdBlog);
        }
    }
    modal.style.display = "none";

    xhr.open("POST", "/website/Blog/saveComment");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("blogId=" + btnWithIdBlog.name + "&content=" + Modalcontent.value);

}

createModal();

