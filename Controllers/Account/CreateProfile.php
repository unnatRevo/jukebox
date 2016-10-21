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
?>
