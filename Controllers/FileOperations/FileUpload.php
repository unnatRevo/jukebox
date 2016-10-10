<?php
session_start();
  // require('../../Models/FilesOpearations/FilesOpearationsModel.php');
  $user = $_SESSION['username'];
  $files = $_FILES['fileUpload'];
  $filePath = "/home/wacky_coder/userdata/".$user;
  $uploadPath = "/home/wacky_coder/userdata/".$user."/";
  static $upload = 1;

  function setFileDetails ( $file, $path ) {
    $target_file = $target_dir . basename($file["name"]);

    $fileName = $file['name'];
    $fileSize = ( $file['size'] / 1024 ) / 1024;
    $fileType = $file['type'];
    $filePath = $path . $fileName;
    $fileExtension = pathinfo($target_file,PATHINFO_EXTENSION);
    $fileUploadError = $file['error'];

    $fileObject = new db_FileOperations();
    $details = $fileObject->fileDetails($user, $fileName, $fileSize, $fileType, $fileExtension, $filePath, $fileUploadError);
  }

  function fileMove ( $file, $uploadPath, $path ) {

    // Check folder exits
    if (is_dir($path)) {
      echo "<script> alert('$uploadPath : exists.'); </script>";
        $upload = 1;
    } else {
        if (mkdir($path)) {
            echo "<script> alert('folder created.'); </script>";
            $upload = 1;
        } else {
            echo "<script> alert('Cannot create folder.'); </script>";
            $upload = 0;
        }
    }

    $isSuccess = false;
    $target_dir = $uploadPath;
    $target_file = $target_dir . basename($file["name"]);
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["btnUpload"])) {
         echo "<script>alert('$fileType');'</script>";
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script> alert('Sorry, file already exists.'); </script>";
        $isSuccess = false;
        $upload = 0;
    }

    // Check if $upload is set to 0 by an error
    if ($upload == 0) {
        echo "Sorry, your file was not uploaded.";
        $isSuccess = false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "The file <strong>". basename( $file["name"]). "</strong> has been uploaded.";
            $isSuccess = true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            header('Location : ../../Views/Welcome.php');
            $isSuccess = false;
        }
    }
    return $isSuccess;
  }

  setFileDetails($files, $uploadPath);
?>
