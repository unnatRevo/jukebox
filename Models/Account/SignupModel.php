<?php
  /**
   * @author : Unnat
   * @user :
   */
  class UserSignup
  {

    function __construct(argument)
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
    
    function InsertLoginDetails()
    {

    }
  }

?>
