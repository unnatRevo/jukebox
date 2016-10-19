<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    require ('../../Controllers/Enums/ALL_ENUMS.php');
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

		function setFileDetails ( $user, $fileName, $fileSize, $fileType, $fileExtension, $filePath, $fileUploadError ) {
			$con = $this->DBConnect();
      $sqlQuery = "CALL sp_SetFileDetails('$user',
                                      '$fileName',
                                      $fileSize,
                                      '$fileType',
                                      '$fileExtension',
                                      '$filePath',
                                      $fileUploadError)";
			if ($con->connect_error) {
					die ("Connection Error : " .  $con->connect_error);
          return false;
			} else {
          if ($con->query($sqlQuery) === TRUE) {
            $_SESSION['fileUploadStatus'] = FILE_ENUM::DB_ENTRY_DONE;
          } else {
            // $_SESSION['fileUploadStatus'] = 0;
            $_SESSION['fileUploadStatus'] = FILE_ENUM::DB_ENTRY_FAILE;
          }
      }
      $con->close();
		}	// end of userLogin

    function getFileDetails( $username ) {
      $connection = $this->DBConnect();
      $result = $connection->query("CALL sp_GetFileDetails('$username')");
      return $result;
    }
	}	//end of class
?>
