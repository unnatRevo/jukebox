<?php
header('Content-type : application/json');
	if ( !(isset($_SESSION['loginStatus']))){
		session_start();
	}
	$rootDirectory = $_SERVER['SCRIPT_NAME'];
	$username = json_decode($_POST['txtLoginUsername']);
	$password = json_decode($_POST['txtLoginPassword']);

	class dbOperations{
		function DBConnect() {
			//  $servername = "MYSQL5017.Smarterasp.net";
			//  $username="9f39b3_djb";
			//  $password="P@55w0rd#";
			//  $dbName = "db_9f39b3_djb";

			$servername = "localhost";
			$username="root";
			$password="";
			$dbName = "JukeBox";

			$con = new mysqli($servername,
							$username,
							$password,
							$dbName);

			if ( $con->connect_error ) {
				echo "<script>"
						."alert('"
						.die("Database Connection error : " . $con->connect_error)
						."');"
					."</script>";
			}
			return $con;
		}	// end of DBConnect();

		function userLogin ( $username, $password ) {

			$con = $this->DBConnect();

			if ($con->connect_error) {
					die ("Connection Error : " .  $con->connect_error);
			}
			$result = $con->prepare("CALL sp_CheckUserdetails('$username', '$passsword')");
			$result->execute();
			if ($result === TRUE ) {
				$_SESSION["loginStatus"] = 1;
				$_SESSION["username"] = $username;
				header('Location:../../Views/Welcome.php');
				if (!($con->close())) {
					die ("Error : " . $con->connect_error);
				}
				exit();
			} else {
				$_SESSION["loginStatus"] = 0;
				$_SESSION["username"] = $username;
				unset($_SESSION['username']);
				unset($_SESSION['loginStatus']);
				session_destroy();
				header('Location:../../index.php');
				if (!($con->close())) {
					die ("Error : " . $con->connect_error);
				}
				exit();
			}
			}	// end of userLogin
	}	//end of class

	$object = new dbOperations;
	if  ( isset($_POST['action']) && !empty($_POST['action']) ) {
		$action = $_POST['action'];

		switch ($action) {
			case 'userlogin':
				$object->userLogin($username, $password);
				break;

			default:
					echo "<script> alert('nothing.'); </script>";
				break;
		}
	}
?>
