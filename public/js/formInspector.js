let inputs=$(".required"),dateInput=$("#date"),yearSelect=$("#yearSelect"),monthSelect=$("#monthSelect"),calendarr=$("#calendar");function validate(){let t=!1;return inputs.each((function(){switch(console.log($(this).attr("id")),$(this).attr("id")){case"FIO":t=CheckFIO($(this));break;case"phone":t=CheckPhone($(this));break;case"texarea":t=CheckTextArea($(this));break;default:"int"==$(this).attr("name")&&(t=CheckForInt(i)),$(this).val()?$("#"+($(this).attr("id")+"f")).html(""):($("#"+(numbEl.attr("id")+"f")).html("*данное поле обязательно для заполнения"),$(this).focus(),t=!1)}})),t}function enter(t){let e="";switch(t){case"FIO":e="Enter fio";break;case"phone":e="Enter phone";break;case"texarea":e="Enter text";break;default:e="Поле не должно быть пустым"}$("#"+(t+"d")).html(e),$("#"+(t+"d")).css({border:"1px solid green","padding-left":"20px","padding-right":"20px"})}function leave(t){$("#"+(t+"d")).html(""),$("#"+(t+"d")).css({border:"0px","padding-left":"0px","padding-right":"0px"})}function CheckFIO(t){return el=t,3!=el.val().split(" ").length?($("#"+(t.attr("id")+"f")).html("*должно быть три слова(пробела)"),el.css({"border-color":"rgb(224 0 0)"}),!1):($("#"+(t.attr("id")+"f")).html(""),el.css({"border-color":"rgb(0 224 0)"}),!0)}function CheckPhone(t){el=t;return/^\+[73] ?\(?\d{3}\)?[\- ]?\d{3}[\- ]?\d{2}[\- ]?\d{2}$/.test(el.val())?($("#"+(t.attr("id")+"f")).html(""),el.css({"border-color":"rgb(0 224 0)"}),!0):($("#"+(t.attr("id")+"f")).html("*ошибка"),el.css({"border-color":"rgb(224 0 0)"}),!1)}function CheckForInt(t){return null!=t&&(0==/^\d$/.test(t.value)?($("#"+(numbEl.attr("id")+"f")).html("*введите целочисленное значение"),t.css({"border-color":"rgb(224 0 0)"}),!1):($("#"+(numbEl.attr("id")+"f")).html(""),t.css({"border-color":"rgb(0 224 0)"}),!0))}function CheckTextArea(t){return el=t,0==/[^ ]/.test(el.val())?($("#"+(t.attr("id")+"f")).html("*заполните это поле"),el.css({"border-color":"rgb(224 0 0)"}),!1):($("#"+(t.attr("id")+"f")).html(""),el.css({"border-color":"rgb(0 224 0)"}),!0)}function setDate(){dateInput.val(dayNumb+"."+monthSelect.val()+"."+yearSelect.val()),setDay()}