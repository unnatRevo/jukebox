<?php
  
  //if ( !(isset($_SESSION)) ) {
   session_start();   
  //}
  require('../../Models/FilesOpearations/FilesOpearationsModel.php');
  $files = $_FILES['fileUpload'];
  $filePath = "../../userdata/".$_SESSION['username'];
  

  function setFileDetails ( $file, $path ) {
    $target_file = $path."/". basename($file["name"]);
    
    $user = $_SESSION['username'];
    $fileName = $file['name'];
    $fileSize = ( $file['size'] / 1024 ) / 1024;
    $fileType = $file['type'];
    $filePath = $path .'/'. $fileName;
    $fileExtension = pathinfo($target_file,PATHINFO_EXTENSION);
    $fileUploadError = $file['error'];

    $fileObject = new db_FileOperations();
    $details = $fileObject->fileDetails($user, $fileName, $fileSize, $fileType, $fileExtension, $filePath, $fileUploadError);
  }

  function fileMove ( $file, $path ) {
      
    $upload = 1;
    
    // Check folder exits
    if (is_dir($path)) {
        echo "<script> alert('$path : exists.'); </script>";
        $upload = 1;
    } else {
        if (mkdir($path, 0777)) {
            echo "<script> alert('folder created.'); </script>";
            $upload = 1;
        } else {
            echo "<script> alert('Cannot create folder.'); </script>";
            $upload = 0;
        }
    }

    $isSuccess = false;
    $target_dir = $path;
    $target_file = $target_dir. '/' . basename($file["name"]);
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if($_POST["btnUpload"]) {
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
        
        setFileDetails($file, $path);
        $dir = explode('/', $_SERVER['SCRIPT_NAME']);
        
        if (move_uploaded_file($file["tmp_name"], $target_file) && $_SESSION['fileUploadStatus'] == 1 ) {
            echo "The file <strong>". basename( $file["name"]). "</strong> has been uploaded.";
            header("Location:/".$dir[1]."/Views/FileOperations/FileUpload.php");
            $isSuccess = true;
        } else {
            echo "Sorry, there was an error uploading your file.<br><br>";
            header("Location:/".$dir[1]."/Views/FileOperations/FileUpload.php");
            $isSuccess = false;
        }
    }
  }
  fileMove($files,$filePath);
?>
