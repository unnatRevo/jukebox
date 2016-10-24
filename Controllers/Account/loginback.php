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

class UsersLogin {
	public $username = null;
	public $password = null;
	public $success = false;
	public function userLogin($username, $password) {
		try{
			 $object = new dbOperations;
			 $object->userLogin($username, $password);
			 
		 } catch (Exception $e) {
			 echo $e->getMessage();
			 return $success;
			}
		}
}
?>
