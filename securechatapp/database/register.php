<?php
include 'chatuser.php';
include 'database_connection.php';
$error = '';
$success_message = '';

	if(isset($_POST["register"]))
	{
	session_start();

		if(isset($_SESSION['user_data']))
		{
			header('location:chatroom.php');
		}

		

		$user_object = new chatuser;

		$user_object->setUserName($_POST['user_name']);

		$user_object->setUserEmail($_POST['user_email']);

		$user_object->setUserPassword($_POST['user_password']);

		$user_object->setUserPhoneNo($_POST['user_phoneno']);

		$user_object->setUserProfile($user_object->make_avatar(strtoupper($_POST['user_name'][0])));

		$user_object->setUserStatus('Disabled');

		$user_object->setUserCreatedOn(date('Y-m-d H:i:s'));

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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign-up form</title>

	<!-- bootstarp core css -->
	<link rel="stylesheet"  href="vendor-front/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="vendor-front/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" type="text/css" href="vendor-front/parsley/parsley.css">

	<!--bootstrap core javascript-->
	<script src="vendor-front/jquery/jquery.min.js"></script>

	<script src="vendor-front/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!--core plugin javascript-->
	<script src="vendor-front/jquery-easing/jquery.easing.min.js"></script>

	<script type="text/javascript" src="vendor-front/parsley/dist/parsley.min.js"></script>
</head>
<body>
	

	<div class="container">
		<br/>
		<br/>
		<h1 class="text-center">Secure Chat App</h1>

		<div class="row justify-content-md-center">
			<div class="col col-md-4 mt-5">

				<?php 

				if($error!= '')
				{
					echo '<div class ="alert alert-warning alert-dismissible fade show" role="alert">
					'.$error.'
					<button type="button" class="close" data-dismissible="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					';
				}

				if($success_message!= '')
				{
					echo ' 
					<div class ="alert alert-success">
					'.$success_message.'
					</div>

					';
				}

				?>
				<div class="card">
				   <div class ="card-header">Register</div>
				  <div class="card-body">

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
			<input type="submit" name="register" class="btn btn-success" value="Register"/>
		</div>
	</form>

				   </div>
			   </div>
			</div>
		</div>
	</div>





</body>
</html>



<script>
	$(document).ready(function(){
		$('#register_form').parsley();
	})
</script>