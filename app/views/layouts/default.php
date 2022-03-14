<?php
$arr = [
    'main' => ['index', 'Главная страница'],
    'aboutMe' => ['show', 'Обо мне'],
    'interests' => ['show', 'Мои интересы'],
    'courses' => ['show', 'Учёба'],
    'test' => ['show', 'Тест'],
    'photoAlbum' => ['show', 'Фотоальбом'],
    'contact' => ['show', 'Контакт'],
    'viewingHistory' => ['show', 'История просмотров']
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
                <?php foreach ($arr as $key => $value) { ?>
                    <li class='parent_DDmenu' id=<?php echo $key . 'Nav'; ?>>
                        <a href=<?php echo '/website/' . $key . '/' . $value[0]; ?>><?php echo $value[1];  ?></a>
                    </li>
                <?php } ?>
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
    <?php echo $content; ?>

</body>

</html>