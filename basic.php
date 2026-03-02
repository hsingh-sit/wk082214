<?php
// NO SPACES, NO OUTPUT before this line
$valid_users = ['carlos' => 'superman'];

// Parse Basic Auth header (Apache/PHP-FPM fix)
if (!isset($_SERVER['PHP_AUTH_USER']) && 
    isset($_SERVER['HTTP_AUTHORIZATION']) && 
    preg_match('/Basic\s+(.*)$/i', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = 
        explode(':', base64_decode($matches[1]), 2);
}

// Check auth - NO OUTPUT if invalid
if (empty($_SERVER['PHP_AUTH_USER']) || 
    empty($_SERVER['PHP_AUTH_PW']) || 
    !isset($valid_users[$_SERVER['PHP_AUTH_USER']]) || 
    $valid_users[$_SERVER['PHP_AUTH_USER']] !== $_SERVER['PHP_AUTH_PW']) {
    
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Week 08 Lab - Basic Auth Vulnerable"');
    header('Cache-Control: no-cache');
    exit;
}

// SUCCESS - ONLY NOW output HTML
?>
<!DOCTYPE html>
<html>
<head><title>Basic Auth Success</title></head>
<body>
<h2>✅ HTTP Basic Auth SUCCESS</h2>
<p>You logged in as: <b><?= $_SERVER['PHP_AUTH_USER'] ?></b></p>
<p><b>Attack this with Burp Suite:</b></p>
<ul>
<li>Intercept → See Authorization header</li>
<li>Base64 decode: Y2FybG9zOnN1cGVybWFu = carlos:superman</li>
<li>Replay in new browser</li>
<li>Modify 1 byte → Test validation</li>
</ul>
<p>Username: carlos | Password: superman</p>
</body>
</html>
