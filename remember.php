# Remember me cookie (remember.php)
cat > remember.php << 'EOF'
<?php
if ($_COOKIE['remember'] ?? false) {
    echo "Logged in via insecure remember me cookie!";
} else {
    echo "Enable remember me first";
}
?>
EOF
