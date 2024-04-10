<?php
session_start();
session_destroy();

header("Location: login.php");  // Redirecion a Login
echo "Session CERRADA";
?>