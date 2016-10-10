<?php
	session_start();

	class db_FileOperations{

		function DBConnect() {
			//  $servername = "MYSQL5017.Smarterasp.net";
			//  $username="9f39b3_djb";
			//  $password="P@55w0rd#";
			//  $dbName = "db_9f39b3_djb";

			$servername = "localhost";
			$username="root";
			$password="root";
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

		function fileDetails ( $user, $fileName, $fileSize, $fileType, $fileExtension, $filePath, $fileUploadError ) {
			$con = $this->DBConnect();
			$sqlQuery = "INSERT INTO "
						."filedetails VALUES (NULL, "
							.", '". $user ."'"
							.", '". $fileName ."'"
							.", ". $fileSize
							.", '". $fileType ."'"
							.", '". $fileExtension ."'"
							.", '". $filePath."'"
							."," . $fileUploadError
						.")";

			if ($con->connect_error) {
					die ("Connection Error : " .  $con->connect_error);
			}

			if ($con->query($sqlQuery) === TRUE) {
				$_SESSION['fileupload'] = 1;
				$con->close();
				header('Location : ../../Views/FileOperations/FileUpload.php');
			} else { 
				$_SESSION['fileupload'] = 0;
				$con->close();
				header('Location : ../../Views/FileOperations/FileUpload.php');
			}
		}	// end of userLogin

		function userSignup (){

		}	// end of userSignup
	}	//end of class
?>
