<?php
if (!empty($vars)) {
    foreach ($vars as $key => $value) {
        switch ($key) {
            case 'errors':
                foreach ($value as $key1 => $value1) {
                    foreach ($value1 as $value2) {
                        echo '<p class="error"> ' . $key1 . ': ' . $value2 . '</p>';
                    }
                }
                break;

            case 'errors':
                echo '<p class="rating"> ' . $value . '</p>';
                break;
            default:
                echo $vars[$key];
                break;
        }
    }
}
?>
<form name="form" action="/website/test/show" method="post" onsubmit="return validate()">

    <p>
        ФИО:
        <input name="FIO" class="required" id="FIO" maxlength="50" size="50" type="text">
        <span class="error" id="1f"></span>
    </p>
    <select name="group">
        <optgroup label="Is">
            <option value="IS-1">IS-1</option>
            <option value="IS-2">IS-2</option>
        </optgroup>
        <optgroup label="PIN">
            <option value="PIN-1">PIN-1</option>
        </optgroup>
    </select>
    <br>
    <br>
    <div style="border: 2px solid rgb(177, 5, 5); padding: 5px;">
        <p>Какой формат страницы является наименьшим?</p>
        A:
        <input class="required" name="int" type="text">
        <span id="2f" style="color:red"></span>
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
                <option value="297х420">х420</option>
                <option value="297х380">х380</option>
            </optgroup>
            <optgroup label="210">
                <option value="210х297">297</option>
                <option value="210х280">280</option>
                <option value="210х305">305</option>
            </optgroup>
        </select>
    </div>
    <br>
    <input name="enter" id="submit" type="submit" value="Отправить">
    <input name="clean" type="reset" value="Очистить форму">
</form>

<script type="text/javascript" src='/website/public/js/formInspector.js'></script>