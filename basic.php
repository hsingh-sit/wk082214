<html>
<body>

<?php
$valid_users = ['carlos' => 'superman'];

// Fix for Apache + PHP-FPM (Render.com): Parse Authorization header manually
if (!isset($_SERVER['PHP_AUTH_USER']) && 
    isset($_SERVER['HTTP_AUTHORIZATION']) && 
    preg_match('/Basic\s+(.*)$/i', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = 
        explode(':', base64_decode($matches[1]), 2);
}

// Check credentials BEFORE any output
if (!isset($_SERVER['PHP_AUTH_USER']) || 
    !isset($_SERVER['PHP_AUTH_PW']) || 
    !isset($valid_users[$_SERVER['PHP_AUTH_USER']]) || 
    $valid_users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW']) {
    
    // NO OUTPUT before headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Week 08 Lab - Basic Auth"');
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    exit('Access denied. Username: carlos, Password: superman');
}

// SUCCESS - authenticated
echo '<h2>HTTP Basic Auth SUCCESS</h2>';
echo '<p>You logged in as: <b>' . $_SERVER['PHP_AUTH_USER'] . '</b></p>';
echo '<p>Attack vectors to test with Burp:</p>';
echo '<ul>';
echo '<li>Base64 decode Authorization header</li>';
echo '<li>Replay attacks across browsers</li>';
echo '<li>Modify username/password bytes</li>';
echo '</ul>';
?>

<body>
</html>
