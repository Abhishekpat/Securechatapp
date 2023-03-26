<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to chat app</title>
</head>
<body>

	<div id="SignUp Div">
		<form id = "form2" method="post" action="InsertUser.php">
			<h2>Signup Form</h2>

			<table>
				<tr>
					<td>
						<input type="text" name="UserName" placeholder="Enter Your name" required>
					</td>
				</tr>

				<tr>
					<td>
						<input type="email" name="UserMail" placeholder="Enter Your Email" required>
					</td>
				</tr>

				<tr>
					<td>
						<input type="password" name="UserPassword" placeholder="Enter Your Password" required>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="SignUp"></td>
				</tr>
			</table>

		</form>
		
	</div>

</body>
</html>