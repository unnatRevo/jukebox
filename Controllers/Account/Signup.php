<?php

  require ('../../Models/Account/SignupModel.php');
  $username = $_POST['txtSignupUsername'];
  $password = $_POST['txtSignupPassword'];

  class UserSignupController
  {
    # fetches value of email and password

    function SetLoginDetails ($username, $password)
    {
      $userSignupObj = new UserSignupModel();
      $userSignupObj->InsertLoginDetails($username, $password);
    }
  }

  $object = new UserSignupController();
  $object->SetLoginDetails($username, $password);
?>
