<?php
    if (!(isset($_SESSION["username"]))) {
        echo "<script> alert ('login_status_check.php called.'); </script>";
        header("Location: ~/index.php");
    }
?>