<?php
	$username = $_POST["txtLoginUsername"];
	$password = $_POST["txtLoginPassword"];

	include('../../Models/Account/IndexModel.php');

	$obj = new dbOperations();
	$obj->userLogin($username, $password);
?>
