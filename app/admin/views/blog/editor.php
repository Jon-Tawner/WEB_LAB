<form name="form" action="/website/Blog/editor" method="post" enctype="multipart/form-data">
    <p>
        Заголовок:
        <input name="title" maxlength="100" size="100" type="text">
    </p>
    Выберите картинку: <input type="file" name="img" size="10">
    <br>
    <br>
    <p>
        Контент:
        <br>
        <textarea name="content" cols="50" rows="10"></textarea>
    </p>
    <br>
    <input name="enter" id="submit" type="submit" value="Отправить">
    <input name="clean" type="reset" value="Очистить форму">
</form>
<br><br>