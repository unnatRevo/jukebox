<?php
    if (!isset($_SESSION)) {
        session_start();        
    }	

	class db_FileOperations{

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

		function fileDetails ( $user, $fileName, $fileSize, $fileType, $fileExtension, $filePath, $fileUploadError ) {
			$con = $this->DBConnect();
			$sqlQuery = "INSERT INTO filedetails VALUES (DEFAULT,'". $user ."', '". $fileName ."', ". $fileSize.", '". $fileType ."', '". $fileExtension ."', '". $filePath."'," . $fileUploadError .")";
			if ($con->connect_error) {
					die ("Connection Error : " .  $con->connect_error);
                    $_SESSION['fileUploadStatus'] = -1;
			}

			if ($con->query($sqlQuery) === TRUE) {
				$_SESSION['fileUploadStatus'] = 1;
			} else { 
				$_SESSION['fileUploadStatus'] = 0;				
			}
            $con->close();
		}	// end of userLogin
	}	//end of class
?>
