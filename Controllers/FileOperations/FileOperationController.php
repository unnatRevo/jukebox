<?php

   if ( !(isset($_SESSION)) ) {
   session_start();
   }
  require('../../Models/FilesOpearations/FilesOpearationsModel.php');

  $filePath = "../../userdata/" . $_SESSION["username"];

  class FileList
  {
    function getFileDetails ( $username ) {
      $object = new db_FileOperations;
      return $object->getFileDetails($username);
    }
  }

?>
