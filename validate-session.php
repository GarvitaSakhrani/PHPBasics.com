<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=true){
  $currentPage = basename($_SERVER['PHP_SELF']);
  header("Location: login-session.php?redirect=$currentPage");
  exit();
}
?>
