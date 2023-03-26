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



?>