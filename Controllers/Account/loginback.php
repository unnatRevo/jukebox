<?php
	include('../../Models/Account/IndexModel.php');
	// if ( !($username == "" || $username == null || empty($username)) &&
	//  			!($password == "" || $password == null || empty($password))) {
	// 				$obj = new dbOperations();
	// 				$obj->userLogin($username, $password);
	// } else {
	// 	if (isset($_SESSION)) {
	// 		session_destroy();
	// 	}
	// 	header('Location: ../../index.php');
	// }

class Users {
	public $username = null;
	public $password = null;

	public function __construct( $data = array() ) {
		if( isset( $data['txtLoginUsername'] ) ) $this->username = stripslashes( strip_tags( $data['txtLoginUsername'] ) );
		if( isset( $data['txtLoginPassword'] ) ) $this->password = stripslashes( strip_tags( $data['txtLoginPassword'] ) );
	}

	public function storeFormValues( $params ) {
	 $this->__construct( $params );
	}

	public function userLogin() {
		$success = false;
		try{
			 $stmt = $con->prepare( "CALL sp_CheckUserdetails('$username', '$passsword')" );
			 $stmt->execute();

			 if( $valid ) {
				 $success = true;
				 echo ('Login');
				 exit();
			 }

			 $con = null;
			 return $success;
			 } catch (PDOException $e) {
			 echo $e->getMessage();
			 return $success;
			}
		}
}
?>
