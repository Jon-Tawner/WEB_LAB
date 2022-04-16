<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$arr = [
    'Main' => ['show' => ['title' => 'Главная страница', 'onlyUser' => '0']],
    'AboutMe' => ['show' => ['title' => 'Обо мне', 'onlyUser' => '1']],
    'Interests' => ['show' => ['title' => 'Мои интересы', 'onlyUser' => '1']],
    'Courses' => ['show' => ['title' => 'Учёба', 'onlyUser' => '1']],
    'Test' => ['show' => ['title' => 'Тест', 'onlyUser' => '1']],
    'PhotoAlbum' => ['show' => ['title' => 'Фотоальбом', 'onlyUser' => '0']],
    'Contact' => ['show' => ['title' => 'Контакт', 'onlyUser' => '0']],
    'GuestBook' => ['show' => ['title' => 'Гостевая книга', 'onlyUser' => '0']],
    'Blog' => [
        'show' => ['title' => 'Блоги', 'onlyUser' => '0'],
        'editor' => ['title' => 'Редактор блога', 'onlyUser' => '1'],
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="/website/public/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="/website/public/js/jquery.js"></script>
    <script type="text/javascript" src='/website/public/js/timeMenu.js'></script>
    <script type="text/javascript" src="/website/public/js/form.js"></script>
    <script type="text/javascript" src='/website/public/js/Text.js'></script>
    <script type="text/javascript" src='/website/public/js/Anchors.js'></script>
</head>

<body>
    <header>
        <h1 id="title">
            <? if (isset($_SESSION['user'])) : ?>
                <?= "Привет " . $_SESSION['user']['name'] . '!'; ?>
            <? endif ?>
            <div class='date-time'></div>
            <br>
            <p style="text-align:center;"><?= $title; ?></p>
            <p style="text-align:center;"><a href="/website/Account/authorization"><? echo isset($_SESSION['user']) ? 'Выйти' : 'Войти' ?></a></p>
        </h1>
        <nav id='nav'>
            <ul>
                <?php foreach ($arr as $key => $value)
                    foreach ($value as $key1 => $value1)
                        if ($value1['onlyUser'] == '0' || isset($_SESSION['user'])) : ?>
                    <li class='parent_DDmenu' id=<?= $key . $key1 . 'Nav'; ?>>
                        <a href=<?= '/website/' . $key . '/' . $key1; ?>><?= $value1['title'];  ?></a>
                    </li>
                <?php endif ?>
            </ul>

            <script type="text/javascript" src='/website/public/js/drop_downMenu.js'></script>

        </nav>
        <div id='notification'>
            <div>
                <p>Сайт использует куки!!</p>
                <p>Печеньки это вкусно ? :)</p>
                <div class='notification__buttons'>
                    <button id='accept'>Согласен</button>
                    <button>Не согласен</button>
                </div>
            </div>
        </div>

    </header>

    <?php
    if (!empty($err)) {
        foreach ($err as $key1 => $value1) {
            foreach ($err[$key1] as $value2) {
                echo '<p class="error"> ' . $key1 . ': ' . $value2 . '</p>';
            }
        }
    }
    if (isset($vars["errors"])) {
        foreach ($vars["errors"] as $value) {
            echo '<p class="error"> ' . $value . '</p>';
        }
    }
    ?>

    <?php echo $content; ?>

</body>

</html>