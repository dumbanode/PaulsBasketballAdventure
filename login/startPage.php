<?php
/*
    startPage.php 
    Cameron Smith
    March 29 2018

    the login page for the game
*/
session_start();
$status;
require_once("inputHelper.php");
require_once("loginHelpers.php");

if(isset($_SESSION['UserData']['Username'])){
	$status=2;
}
if(isset($_POST['submit'])){
	$form_name=$_POST['user'];
	$form_pw=$_POST['pw'];
	
	if(attempt_login($form_name, $form_pw) ){
		$_SESSION['UserData']['Username']=htmlspecialchars($form_name);
		$status = 1;
	}else{
		$status = 0;
	}
}
?>
<html>
<head>
<title>Paul McCartney's Basketball Adventure</title>
<!--favicon-->
<link rel="shortcut icon" href="../icons/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>
<body>
</header>
<div id="title">
    <p id="top">Paul McCartney's</p>
    <p id="bottom">Basketball Adventure</p>
</div>
<div id="content">
    <p>Currently the username and password system is not working</p>
    <a href="#">Click Here to play without an account<br><br></a>
    <form action="startPage.php" method="POST">
	    <label for="user">User Name: </label>
	    <input type="text" id="user" name="user" required="required"\>
	    <label for="pw">Password: </label>
	    <input type="password" id="pw" name="pw" required="required"\>
	    <input type="submit" id="submit" name="submit" value="login"\>
    </form>

<?php 
	if($status === 1 || $status === 2){
		header("location:../index.php");	
	}else{
		echo "Wanna play? ";
		echo "<a href=\"register.php\">Register Here</a>";
	}	
?>

</div>

</body>
</html>
