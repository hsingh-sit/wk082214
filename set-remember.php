<?php
// Sets VULNERABLE remember me cookie
setcookie('remember_me', 'cmVhbC11c2VyOmNhcmxvcy1zdXBlcm1hbg==', time()+3600, '/', '', false, false);  
// Base64: real-user:carlos-superman (PREDICTABLE!)
?>
<h2>✅ Remember Me Cookie SET</h2>
<p>Go back to <a href="remember.php">remember.php</a></p>
<p><b>Burp Attack:</b> Inspect cookie → Base64 decode → Modify → Replay</p>
