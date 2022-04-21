<?php
if (!empty($vars)) {
    foreach ($vars as $key => $value) {
        switch ($key) {
            case 'rating':
                echo '<p class="rating"> ' . $value . '</p>';
                break;
        }
    }
}
?>

<form name="form" action="/website/Test/show" method="post">

    <br>
    <br>
    <div style="border: 2px solid rgb(177, 5, 5); padding: 5px;">
        <p>Какой формат страницы является наименьшим?</p>
        A:
        <input class="required" name="int" type="text">
        <br>
        <br>
        <div>
            <p>Как обозначается формат чертежа:</p>
            <p>
                буквой и цифрой
                <input checked="checked" name="2_task" type="radio" value="буквой и цифрой">
            </p>
            цифрой
            <input name="2_task" type="radio" value="цифрой">
            буквой
            <input name="2_task" type="radio" value="буквой">
        </div>
        <p>Формат А4 имеет размеры:</p>
        <select name="group">
            <optgroup label="297">
                <option value="297х420">297х420</option>
                <option value="297х380">297х380</option>
            </optgroup>
            <optgroup label="210">
                <option value="210х297">210x297</option>
                <option value="210х280">210x280</option>
                <option value="210х305">210x305</option>
            </optgroup>
        </select>
    </div>
    <br>
    <input name="enter" id="submit" type="submit" value="Отправить">
    <input name="clean" type="reset" value="Очистить форму">
</form>

<button type="button" onclick="location='/website/Test/show?link'">Show history</button>
<?
if (isset($_GET["link"]) && $vars["history"]) {
    foreach ($vars["history"] as $value) {
        echo "<p>ФИО: " . $value->name . "</p>";
        echo "<p>Какой формат страницы является наименьшим?: " . $value->answer1 . "</p>";
        echo "<p>Как обозначается формат чертежа: " . $value->answer2 . "</p>";
        echo "<p>Формат А4 имеет размеры: " . $value->answer3 . "</p>";
        echo "<p>Баллы: " . $value->rating . "</p>";
        echo "<p>Дата: " . $value->date . "</p>";
        echo "<hr>";
    }
}
