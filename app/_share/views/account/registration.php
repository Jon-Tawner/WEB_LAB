<div id="registration">
    <form method='post' action="/website/Account/registration">
        <input type='text' placeholder='ФИО' name='name' required><br>
        <input type='email' placeholder='e-mail' name='email' required><br>
        <input type='text' placeholder='Логин' name='login' onblur="isExists(this.value)" required><br>
        <input type='password' placeholder='Пароль' name='password' required><br>
        <input class="button" type='submit' value='Войти'>
        <p>
            Перейти к <a href="/website/Account/authorization"> Авторизации</a>
        </p>
    </form>
</div>
<script type="text/javascript" src="/website/public/js/checkLogin.js"></script>