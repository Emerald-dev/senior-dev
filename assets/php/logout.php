<?php
// Logs the user out
setcookie("username", '', time() - 3600, "/");
header("Location: ../../admin/login.php");

?>
