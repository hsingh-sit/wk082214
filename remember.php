<?php
// Vulnerable "Remember Me" cookie demo
// Sets weak, predictable token when you "login" first

if (isset($_COOKIE['remember_me'])) {
    // VULNERABLE: Direct cookie trust, no server validation
    echo "<h2>✅ Remember Me SUCCESS</h2>";
    echo "<p>Logged in via cookie: " . htmlspecialchars($_COOKIE['remember_me']) . "</p>";
    echo "<p><b>Attack this:</b></p>";
    echo "<ul>";
    echo "<li>Base64 decode cookie value</li>";
    echo "<li>Change 1 character → Replay</li>";
    echo "<li>Use in different browser</li>";
    echo "</ul>";
} else {
    echo "<h2>Remember Me - Enable First</h2>";
    echo "<p>No cookie set. ";
    echo "<a href='set-remember.php'>Click here to set vulnerable cookie</a>";
}
?>
