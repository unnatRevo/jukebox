<?php
session_start();
  /**
   *
   */
  class UserProfileModel
  {
    function DBConnect()
    {
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
    }

    function InsertUserDetailsModel($fullname, $sex, $bday, $phone) {
      $connection = $this->DBConnect();

      $statement = $connection->prepare("CALL sp_SetUserDetails(?,?,?,?,?)");
      $statement->bind_param('sssss',$fullname, $sex, $bday, $phone, $email);
      $statement->execute();
      $_SESSION['username'] = $username;
      $_SESSION['loginStatus'] = 1;
      header('Location:../../Views/Welcome.php');
    }
  }

?>
