<form name="form" action="/website/GuestBook/show" method="post">
    <p>
        ФИО:
        <input name="FIO" maxlength="50" size="50" type="text">
    </p>
    <p>
        E-mail:
        <input name="email" maxlength="20" size="20" type="text">
    </p>
    <p>
        Message
        <br>
        <textarea name="text" cols="50" rows="10"></textarea>
    </p>
    <input name="enter" id="submit" type="submit" value="Отправить">
    <input name="clean" type="reset" value="Очистить форму">
</form>
<br>
<p>
    Отзывы
</p>
<? foreach ($vars as  $value) :
?>
    <div class="block">
        <p>ФИО: <?= $value["fio"]; ?>
        </p>
        <p>E-mail: <?= $value["email"]; ?>
        </p>
        <p>Текст отзыва:<br>
            <?= $value["content"]; ?>
        </p>
    </div>
<? endforeach ?>