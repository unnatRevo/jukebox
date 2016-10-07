<?php
  session_start();

  unset($_SESSION['username']);
  unset($_SESSION['loginStatus']);

  session_destroy();
  $_SESSION = array();

  // header('Location:../index.php');
?>
