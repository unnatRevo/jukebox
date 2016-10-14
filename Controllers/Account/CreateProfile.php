<?php
session_start();
  require('../../Models/Account/CreateProfile.php');
  /**
   * @author : Unnat
   */
  class CreateProfileController
  {
      function InsertUserDetailsController($fullname, $sex, $bday, $mobileNumebr, $email) {
        $object = new CreateProfileModel();
        $object->InsertUserDetailsModel($fullname, $sex, $bday, $mobileNumebr, $email);
      }
  }


  $name = $_POST['txtName'];
  $sex = $_POST['gender'];
  $bday = $_POST['txtBday'];
  $phone = $_POST['txtPhone'];
  $email = $_POST['txtEmail'];

  $obj = new CreateProfileController();
  $obj->InsertUserDetailsController($name, $sex, $bday, $phone, $email);
?>
