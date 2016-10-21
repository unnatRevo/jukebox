<?php
header('Content-type : application/json');
	if ( !(isset($_SESSION['loginStatus']))){
		session_start();
	}
	$rootDirectory = $_SERVER['SCRIPT_NAME'];
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
			$sqlQuery = "CALL sp_CheckUserdetails('$username', '$passsword')";

			if ($con->connect_error) {
					die ("Connection Error : " .  $con->connect_error);
			}
				$result = $con->prepare("CALL sp_CheckUserdetails('$username', '$passsword')");
				$result->execute();
				// if ($result === TRUE ) {
					$_SESSION["loginStatus"] = 1;
					$_SESSION["username"] = $username;
					header('Location:../../Views/Welcome.php');
					if (!($con->close())) {
						die ("Error : " . $con->connect_error);
					}
				// } else {
				// 	$_SESSION["loginStatus"] = 0;
				// 	$_SESSION["username"] = $username;
				// 	unset('username');
				// 	unset('loginStatus');
				// 	session_destroy();
				// 	header('Location:../../index.php');
				// 	if (!($con->close())) {
				// 		die ("Error : " . $con->connect_error);
				// 	}
				// }
			}	// end of userLogin
	}	//end of class
?>
