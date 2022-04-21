<form name="form" action="/website/Contact/show" method="post">
    <p>
        ФИО:
        <input name="FIO" maxlength="50" size="50" type="text">
    </p>
    <p>
        Телефон:
        <input name="phone" maxlength="20" size="20" type="text">
    </p>
    <p>
        Male
        <input name="pol" checked="checked" type="radio" value="male">
        Female
        <input name="pol" type="radio" value="female">
    </p>
    <div id="dateBorn">
        Дата рождения
        <div class="date">
            <input name="date" id="date" type="text" value="1.1.1900">
            <div id="calendar">
                <div class="mm-yy">
                    <div id="month">
                        <select id="monthSelect">
                            <optgroup id="monthGroup"></optgroup>
                        </select>
                    </div>
                    <div class="year">
                        <select id="yearSelect">
                            <optgroup id="yearGroup"></optgroup>
                        </select>
                    </div>
                </div>
                <div class="oneMonth">
                    <ul id="week"></ul>
                    <ul id="days"></ul>
                </div>
            </div>
        </div>
    </div>
    <p>
        Message
        <br>
        <textarea name="text" cols="50" rows="10"></textarea>
    </p>
    <br>
    <input name="enter" id="submit" type="submit" value="Отправить">
    <input name="clean" type="reset" value="Очистить форму">
</form>
<script type="text/javascript" src='/website/public/js/drop_downCalendar.js'></script>