<?php
  session_start();

  unset($_SESSION['username']);
  unset($_SESSION['loginStatus']);

  session_destroy();
  $_SESSION = array();

  $homeDirectory = $_SERVER['SCRIPT_NAME'];
  $rootDir = explode("/", $homeDirectory);

  header('Location:/'.$rootDir[1].'/index.php');
?>
