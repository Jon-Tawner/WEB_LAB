<h2>История посящений</h2>

<?php
echo $vars['page'] . '<br>';
echo '<button type="button" onclick="location=\'http://localhost/website/ViewingHistory/show?page=' . ($vars["page"] - 1) . '\'">Prev</button>';
echo '<button type="button" onclick="location=\'http://localhost/website/ViewingHistory/show?page=' . ($vars["page"] + 1) . '\'">Next</button>';


if (isset($vars['reсords']))
    foreach ($vars['reсords'] as $value) {
        echo "<p>" . $value->date . "</p>";
        echo "<p>Login: " . $value->userLogin . "</p>";
        echo "<p>IP: " . $value->ip . "</p>";
        echo "<p>Page: " . $value->page . "</p>";
        echo "<p>Host name: " . $value->host . "</p>";
        echo "<p>Browser: " . $value->browser . "</p>";
        echo "<hr>";
    }
