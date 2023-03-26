<?php

$error = '';
$success_message = '';

	if(isset($_POST["register"]))
	{
	session_start();

		if(isset($_SESSION['user_data']))
		{
			header('location:chatroom.php');
		}

		require_once('database/chatuser.php');

		$user_object = new chatuser;

		$user_object->setUserName($_POST['user_name']);

		$user_object->setUserEmail($_POST['user_email']);

		$user_object->setUserPassword($_POST['user_password']);

		$user_object->setUserPhoneNo($_POST['user_phoneno']);

		$user_object->setUserProfile($user_object->make_avatar(strtoupper($_POST['user_name'][0])));

		$user_object->setUserStatus('Disabled');

		$user_object->setUserCreatedOn(date(Y-m-d H:i:s));

		$user_object->setUserVerificationCode(md5(uniqid()));

		$user_data = $user_object->get_user_data_by_email();


		if(is_array($user_data )&& count($user_data)> 0 )
		{
			$error = 'This Email Already register';

		}
		else
		{
			if($user_object->save_data())
			{
				$success = 'Registeration Completed';
			}
			else
			{
				$error = 'Something Went Wrong try again';
			}
		}

	}

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign-up form</title>
</head>
<body>
	<form  method="post" id="register_form">
		<div class="form-group">
			<label >Enter Name</label>
			<input type="text" name="user_name" id="user_name" class="form-control" data-parsley-pattern="/^[a-zA-Z\s]+$/" required/>
		</div>

		<div class="form-group">
			<label>Enter Email</label>
			<input type="text" name="user_email" id="user_email" class="form-control" data-parsley-pattern="email" required/>
		</div>

		<div class="form-group">
			<label>Enter Password</label>
			<input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" data-parsley-pattern="^[a-zA-Z\s]+$" required/>
		</div>

		<div class="form-group text-center">
			<input type="submit" name="register" class="btn btn-success" value="Register">
		</div>
	</form>
</body>
</html>

?>

<script>
	$(document).ready(function(){
		$('#register_form').parsley();
	})
</script>