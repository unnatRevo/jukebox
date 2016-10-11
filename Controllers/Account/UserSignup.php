<?php

  require ('../../Models/Account/SignupModel.php');
  class UserSignup
  {
    # fetches value of email and password
    function __construct()
    {
        # Code
    }

    function SetLoginDetails ()
    {
      $email = $_POST['txtSignupUsername'];
      $password = $_POST['txtSignupPassword'];

      $userSignupObj = new UserSignup();
      $userSignupObj->InsertLoginDetails();
    }
  }
?>
