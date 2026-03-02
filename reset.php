<html>
<body>
<h2>Password Reset</h2>
<form method="POST">
Email: <input type="email" name="email"><br>
<input type="submit" value="Reset">
<?php
if ($_POST['email'] ?? false) {
    $token = 'reset123fixedtoken';  // Predictable!
    echo "<p>Reset link: http://YOURDOMAIN/reset.php?token=$token</p>";
}
if ($_GET['token'] == 'reset123fixedtoken') {
    echo "<p>Password changed for any user!</p>";
}
?>
</body>
</html>
