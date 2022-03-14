 <?php
    if (!empty($vars)) {
        foreach ($vars as $key1 => $value1) {
            foreach ($vars[$key1] as $value2) {
                echo '<p class="error"> ' . $key1 . ': ' . $value2 . '</p>';
            }
        }
    }
    ?>
 <form name="form" action="/website/contact/show" method="post" onsubmit="return validate()">

     <p>
         ФИО:
         <input name="FIO" class="required" id="FIO" maxlength="50" size="50" type="text">
         <span class="error" id="FIOf"></span>
         <span class="info" id="FIOd"></span>
     </p>
     <p>
         Телефон:
         <input name="phone" class="required" id="phone" maxlength="20" size="20" type="text">
         <span class="error" id="phonef"></span>
         <span class="info" id="phoned"></span>
     </p>
     <p>
         Male
         <input name="pol" checked="checked" name="pol" type="radio" value="male">
         Female
         <input name="pol" type="radio" value="female">
     </p>
     <div id="dateBorn">
         Дата рождения
         <div class="date">
             <input name="date" class="required" id="date" type="text" value="1.1.1900">
             <span class="error" id="datef"></span>
             <span class="error" id="dated"></span>
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
         <textarea name="text" class="required" cols="50" id="texarea" name="message" rows="10"></textarea>
         <span class="error" id="texareaf"></span>
         <span class="info" id="texaread"></span>
     </p>
     <br>
     <input name="enter" id="submit" type="submit" value="Отправить">
     <input name="clean" type="reset" value="Очистить форму">
 </form>

 <script type="text/javascript" src='/website/public/js/formInspector.js'></script>
 <script type="text/javascript" src='/website/public/js/drop_downCalendar.js'></script>