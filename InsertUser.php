<?php

	include"classes.php";
	$user = new user();

	if(isset($_POST['UserName']) && isset($_POST['UserMail']) && isset($_POST['UserPassword'])){
		$user->setUsername($_POST['UserName']);
		$user->setUserMail($_POST['UserMail']);
		$user->setUserPassword(sha1($_POST['UserPassword']));
		$user->InsertUser();

		header("Location:index.php?success=1");
	}
?>