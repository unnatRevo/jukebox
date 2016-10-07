<?php
	$username = $_POST["txtLoginUsername"];
	$password = $_POST["txtLoginPassword"];

	require('../Models/IndexModel.php');

	$obj = new dbOperations;
	$obj->userLogin($username, $password);
?>
