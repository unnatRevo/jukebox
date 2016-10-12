<?php
  /**
   * @author : Unnat
   */
  class UserSignupModel
  {

    public static $connection;

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

    function DB_Disconnect()
    {
      if ($connection === TRUE) {
        $connection->close();
      } else {
          die ('Databae Connection Error : ' . $connection->connect_error);
      }
    }

    function InsertLoginDetails($username, $password)
    {
			if ($connection->query("Call sp_Signup_user ('$username', '$password')") == TRUE) {
				header('Location:/'.$rootDirectory[1].'./Controllers/Account/Signout.php');
			} else {
				$signupPage = "/'.$rootDirectory[1].'./Views/Account/Signup.php";
				echo "We have encouterd an error to create your user, Please go to Signup page and try again.<a href=''>Signup</a>";
				header('Location:' . $signupPage);
			}
    }

  }
?>
