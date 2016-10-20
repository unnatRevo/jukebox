<?php

   if ( !(isset($_SESSION)) ) {
   session_start();
   }
  require('../../Models/FilesOpearations/FilesOpearationsModel.php');
  // require ('../Enums/ALL_ENUMS.php');

  $filePath = "../../userdata/" . $_SESSION["username"];
  // $files = $_FILES['fileUpload'];

  class FileOperations
  {
    function setFileDetails ($file) {
      $rootDirectory = explode('/', $_SERVER['SCRIPT_NAME']);
      $target_file = "../../userdata/".$_SESSION['username'].'/'. basename($file["name"]);

      $user = $_SESSION['username'];
      $fileName = $file['name'];
      $fileSize = $file['size'] ;
      $fileType = $file['type'];
      $filePath = $target_file .'/'. $fileName;
      $fileExtension = pathinfo($target_file,PATHINFO_EXTENSION);
      $fileUploadError = $file['error'];

      echo $filePath . "<br><br>";
      $fileObject = new db_FileOperations();
      $details = $fileObject->setFileDetails($user, $fileName, $fileSize, $fileType, $fileExtension, $filePath, $fileUploadError);
     }

    function fileMove ( $file, $path ) {

      $upload = 1;
      if (!(is_dir('../../userdata'))) {
        if (!mkdir('../../userdata', 0777)){
          $upload = 0;
        }
      }

      if (is_dir($path)) {
          $upload = 1;
      } else {
          if (mkdir($path, 0777)) {
              $upload = 1;
          } else {
              $upload = 0;
          }
      }

      $isSuccess = false;
      $target_dir = $path . '/';
      $target_file = $target_dir . basename($file["name"]);
      $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check if file already exists
      if (file_exists($target_file)) {
          $_SESSION['fileUploadStatus'] = FILE_ENUM::FILE_ALREADY_EXIST;
          $upload = 0;
      }

      // Check if $upload is set to 0 by an error
      if ($upload == 0) {
          $_SESSION['fileUploadStatus'] = FILE_ENUM::FILE_COULD_NOT_UPLOAD;
      } else {

          $dir = explode('/', $_SERVER['SCRIPT_NAME']);

          if (move_uploaded_file($file["tmp_name"], $target_file) && $_SESSION['fileUploadStatus'] == FILE_ENUM::DB_ENTRY_DONE ) {
              // header("Location:/".$dir[1]."/Views/FileOperations/FileUpload.php");
              $_SESSION['fileUploadStatus'] = FILE_ENUM::FILE_UPLOAD_DONE;
              $isSuccess = true;
          } else {
              $_SESSION['fileUploadStatus'] = FILE_ENUM::ERROR_WHILE_UPLODING;
              // header("Location:/".$dir[1]."/Views/FileOperations/FileUpload.php");
              $isSuccess = false;
          }
      }
      #header("Location:../../Views/FileOperations/FileUpload.php");
    }
  }
?>
