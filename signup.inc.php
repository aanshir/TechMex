<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pwd=mysqli_real_escape_string($conn,$_POST['password']);

	//error handlers
	//check for empty fields
	if(empty($username)|| empty($email)|| empty($pwd)){
		header("Location: ../signup.php?signup=empty");
		exit();
	}else{
			//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: signup.php?signup=email");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE username='$username';";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				if($resultcheck > 0){
					header("Location: signup.php?signup=usernametaken");
					exit();
				}else{
					//insert the user into the database
					$sql = "INSERT INTO users (username,email,pwd) VALUES ('$username','$email','$pwd');";
					mysqli_query($conn, $sql);
					header("Location: signin.php");
					exit();
				}
			}
		}
	
}else{
	header("Location: signup.php?signup=no");
	exit();
}

 ?>