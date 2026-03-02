<html>
<body>

<?php

if (! pc_validate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
        header('WWW-Authenticate: Basic realm="My Website"');
        header('HTTP/1.0 401 Unauthorized');
        echo "You need to enter a valid username and password.\n";
        exit;
} //docstore.mik.ua/orelly/webprog/pcook/ch08_10.htm

function pc_validate($user,$pass) {
        /* replace with appropriate username and password checking, such as checking a database */
        $users = array('peter' => 'michelle');
        if (isset($users[$user]) && ($users[$user] == $pass)) {
                echo "You are logged in as: $user.\n";
                return true;
        } else {
                echo "Incorrect username or password.\n";
                return false;
        }
}

?>

<body>
</html>
