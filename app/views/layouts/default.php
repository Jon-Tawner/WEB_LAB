<?php
$arr = [
    'Main' => ['show' => 'Главная страница'],
    'AboutMe' => ['show' => 'Обо мне'],
    'Interests' => ['show' => 'Мои интересы'],
    'Courses' => ['show' => 'Учёба'],
    'Test' => ['show' => 'Тест'],
    'PhotoAlbum' => ['show' => 'Фотоальбом'],
    'Contact' => ['show' => 'Контакт'],
    'ViewingHistory' => ['show' => 'История просмотров'],
    'GuestBook' => [
        'show' => 'Гостевая книга',
        'sendBook' => 'Загрузка гостевой книги'
    ],
    'Blog' => [
        'show' => 'Мой блог',
        'editor' => 'Редактор блога',
        'sendCVS' => 'Загрузка сообщений блога',
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
        <h1 id="title"><?php echo $title; ?>
            <div class='date-time'></div>
        </h1>
        <nav id='nav'>
            <ul>
                <?php foreach ($arr as $key => $value)
                    foreach ($arr[$key] as $key1 => $value1) : ?>
                    <li class='parent_DDmenu' id=<?= $key . $key1 . 'Nav'; ?>>
                        <a href=<?= '/website/' . $key . '/' . $key1; ?>><?= $value1;  ?></a>
                    </li>
                <?php endforeach ?>
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
        <script type="text/javascript" src='/website/public/js/Cookies.js'></script>
        <script type="text/javascript" src='/website/public/js/sessionRecorder.js'></script>
        <script type="text/javascript" src='/website/public/js/CookieResol.js'></script>

    </header>
    <?php
    if (!empty($err)) {
        foreach ($err as $key1 => $value1) {
            foreach ($err[$key1] as $value2) {
                echo '<p class="error"> ' . $key1 . ': ' . $value2 . '</p>';
            }
        }
    }
    ?>


    <?php echo $content; ?>

</body>

</html>