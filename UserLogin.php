<?php

session_start();
include "classes.php";

if(isset($_POST['UserMailLogin']) && isset($_POST['UserPassowrdLogin'])){
	$user= new user();
	$user->setUserMail($_POST['UserMailLogin']);
	$user->setUserPassword($_POST['UserPassowrdLogin']);
	if($user->UserLogin()==true){

		$_SESSION['UserId']=$user->getUserId();
		$_SESSION['UserName']=$user->getUserName();
		$_SESSION['UserMail']=$user->getUserMail();

	}
}

?>