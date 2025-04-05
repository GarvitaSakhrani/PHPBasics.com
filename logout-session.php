<?php
session_start();
session_destroy();
header("Location: login-session.php");
exit();
?>