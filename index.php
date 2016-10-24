<!DOCTYPE html>
  <html lang="en">
  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
      <meta name="description" content="Fun page">
      <meta name="author" content="Unnat">
      <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
      <meta http-equiv="pragma" content="no-cache">
      <meta http-equiv="expires" content=0>

      <title>JukeBox</title>

      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
      <!-- Custom CSS -->
      <link href="css/simple-sidebar.css" rel="stylesheet">
  		<link href="css/font-awesome.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
      $(document).ready(function(){
        $("#btnLogin").on("click", function(){
          var username = $("#txtUsername").value;
          var password = $("#txtPassword").value;
					if( (username==""||username==null) && (password==""||password==null) ) {
						$("#lblStatus").show();
						$("#txtUsername").focus();
					}
        });
      });

	// 		var username = $("#txtUsername").value;
	// 		var password = $("#txtPassword").value;
	 //
	// 		$.ajax({
  //      type: "POST",
  //      url: 'Models/Account/IndexModel.php',
  //      data: {action: 'userlogin',
	// 		 				"username" : username,
	// 						"password" : password
	// 	 					},
  //      success: function()
  //      {
  //         window.location = 'Views/Welcome.php';
  //      }
  //  });

      </script>
  </head>

  <body>
          <!-- Page Content -->
          <div id="page-content-wrapper">
              <div class="container-fluid">
                  <div class="row">
                    <div class="container">
                    	<p>
                    		<nav class="navbar navbar-inverse navbar-fixed-top">
                    			<div class="container-fluid">
                    				<div class="navbar-header">
                    					<a class="navbar-brand" href="#">
                    						<font size="30px;">JukeBox</font>
                    					</a>
                    				</div>
                    			</div>
                    		</nav>
                    </p>
                    <div class="omb_login">
                        <h3 class="omb_authTitle">Login or <a href="Views/Account/Signup.php">Sign up</a></h3>
                        <div class="row omb_row-sm-offset-3 omb_socialButtons">
                            <div class="col-xs-4 col-sm-3">
                                <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
                                    <i class="fa fa-facebook visible-xs"></i>
                                    <span class="hidden-xs">Facebook</span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <a href="#" class="btn btn-lg btn-block omb_btn-google">
                                    <i class="fa fa-google-plus visible-xs"></i>
                                    <span class="hidden-xs">Google</span>
                                </a>
                            </div>
                        </div>

                        <div class="row omb_row-sm-offset-3 omb_loginOr">
                            <div class="col-xs-12 col-sm-6">
                                <hr class="omb_hrOr">
                                <span class="omb_spanOr">or</span>
                            </div>
                        </div>

                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-6">
                                <form class="omb_loginForm" action="Models/Account/IndexModel.php" autocomplete="on" method="POST">
																<!-- <form class="omb_loginForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="on" method="POST"> -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="txtUsername"
                                        name="txtLoginUsername" placeholder="Username or email">
                                    </div>
                                    <span class="help-block"></span>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input  type="password" class="form-control" id="txtPassword"
                                        name="txtLoginPassword" placeholder="Password">
                                    </div>
                                    <span class="help-block" style="visibility:hidden;" id="lblStatus">Password error</span>
                                    <button class="btn btn-lg btn-primary btn-block" name="btnLogin" id="btnLogin" type="submit">Login</button>
                                </form>
																<?php
																include('Models/Account/IndexModel.php');
																$username = $_POST['txtLoginUsername'];
																$password = $_POST['txtLoginPassword'];

																if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
																	if ( ($username !== "" || $username !== null) && ($password !== "" || $password !== null)){
																		$object = new dbOperations();
																		$object->userLogin($username, $password);
																	}
																}
																?>
                            </div>
                        </div>
                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-3">
                                <label class="checkbox">
                                    <input type="checkbox" value="remember-me">Remember Me
                                </label>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <p class="omb_forgotPwd">
                                    <a href="#">Forgot password?</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
              </div>
          </div>
          <!-- /#page-content-wrapper -->

      </div>
      <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="js/jquery.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

      <!-- Menu Toggle Script -->
      <script>
      $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });
      </script>

  </body>

  </html>
