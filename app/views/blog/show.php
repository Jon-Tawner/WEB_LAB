<?php
echo $vars['page'] . '<br>';
echo '<button type="button" onclick="location=\'' . $_SERVER['REDIRECT_QUERY_STRING'] . '?page=' . ($vars["page"] - 1) . '\'">Prev</button>';
echo '<button type="button" onclick="location=\'' . $_SERVER['REDIRECT_QUERY_STRING'] . '?page=' . ($vars["page"] + 1) . '\'">Next</button>';

if (isset($vars['regords']))
    foreach ($vars['regords'] as $value) {
        echo "<p>" . $value->date . "</p>";
        echo "<p>" . $value->title . "</p>";
        if (!empty($value->img))
            echo  "<div class='photo'> <img class='img' style='height: 200px' src='/website/public/blog/img/" . $value->img . "'></div>";
        echo "<p>" . $value->content . "</p>";
        echo "<hr>";
    }
