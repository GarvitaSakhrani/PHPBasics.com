<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
  $redirectURL = isset($_GET['q']) ? '?redirect=' . $_SERVER['REQUEST_URI'] : '';
  header("Location: login-session.php$redirectURL");
  exit();
}
?>
