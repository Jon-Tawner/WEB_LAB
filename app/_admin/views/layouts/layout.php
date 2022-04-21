<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$pages = require 'app/_admin/lib/route.php';
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
            <?= "\tАдминистратор - " . $_SESSION['user']['name']; ?>
            <div class='date-time'></div>
            <p style="text-align:center;"><?= $title; ?></p>
            <p style="text-align:center;"><a href="/website/Account/authorization">Выйти</a></p>
        </h1>
        <nav id='nav'>
            <ul>
                <?php foreach ($pages as $controller => $value)
                    foreach ($value as $action => $title) : ?>
                    <li class='parent_DDmenu' id=<?= $controller . $action . 'Nav'; ?>>
                        <a href=<?= '/website/' . $controller . '/' . $action; ?>><?= $title;  ?></a>
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