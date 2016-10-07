<html>
  <head>
    <title>Sign up</title>
  </head>
  <body>
    <fieldset style="width:100px;">
      <legend>Signup</legend>
      <form action="../Controllers/Signupback.php" method="post">
        <p><input type="text" name="txtSignupUsername" id="txtUsername" placeholder="Username"/></p>
        <p><input type="password" name="txtSignupPassword" id="txtPassword" placeholder="Password"/></p>
        <p><input type="password" name="txtSignupConfPassword" id="txtConfPassword" placeholder="Confirm Password"/></p>
        <p><input type="email" name="txtSignupEmail" id="txtEmail" placeholder="Email ID"/></p>
        <p><input type="text" name="txtSignupPhone" id="txtPhone" placeholder="Phone number"/></p>
        <p><input type="submit" name="btnSubmit" value="Sign up"/></p>
        <p><input type="reset" name="btnReset" value="Reset"/></p>
      </form>
    </fieldset>
  </body>
</html>
