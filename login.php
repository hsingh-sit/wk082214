# Vulnerable login form (login.php)
cat > login.php << 'EOF'
<!DOCTYPE html>
<html>
<body>
<h2>Vulnerable Login</h2>
<form method="POST" action="login.php">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login">
<?php
if ($_POST) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Vulnerable: Username enumeration via different error messages
    if ($username == 'carlos' && $password == 'superman') {
        echo "<p style='color:green'>Welcome, $username!</p>";
        setcookie('session', 'loggedin', time()+3600, '/', '', false, true);
    } elseif ($username == 'carlos') {
        echo "<p style='color:red'>Invalid password for $username</p>";  // LEAK!
    } else {
        echo "<p style='color:red'>User not found</p>";
    }
}
?>
</body>
</html>
EOF