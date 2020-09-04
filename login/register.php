<?php
	session_start(); /* Starts the session */
	require_once("loginHelpers.php");
	require_once("inputHelper.php");
	$form_username;
	$form_password;
	$form_email;
	$status;
	$validationErr;
	if(isset($_POST['submit'])){
		$form_username = $_POST['user'];
		$form_password = $_POST['pw'];
		$form_email = $_POST['email'];
		
		//validate and sanitize input
		//validate pw for length:
		if(!has_length($form_password, ['min'=>5, 'max'=>256])){
			$validationErr = "password too short or long";
		}
		//validate username for length:
		if(!has_presence($form_username) || !has_length($form_username, ['min'=>3, 'max'=>50])){
			$validationErr = "user name too short or long";
		}
		
		//create account
		if(!isset($validationErr) && createAccount($form_username, $form_password, $form_email)){
			$status = 1;
			//go to home page
			//set post variable
			$_SESSION['UserData']['Username']=$form_username;
			header("location:../index.php");			
			exit;
		}else{
			$status = 0;
		}
	}
	
	
?>
<html>
<head><title>Register Page</title>
</head>
<body style='text-align:center;'>

<h1>Choose a username and password</h1>
<form action="register.php" method="POST">
	<label for="user">User Name: </label>
	<input type="text" id="user" name="user" required="required"\>
	<label for="pw">Password </label>
	<input type="password" id="pw" name="pw" required="required"\>
	<input type="submit" id="submit" name="submit" value="register"\>
</form>
<?php 
    echo $status;
    echo $validationErr;
	if($status === 0){
		echo "<p>Sorry, that name is already taken.</p>";
	}
?>
</body>
</html>
