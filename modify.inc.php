<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	
	$username = $_SESSION["username"];
	
	$sql = "SELECT * FROM location WHERE username='$username';";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
					

	if($resultcheck < 1){
		$sql = "INSERT INTO location (username,state,city) VALUES ('$username', '$state', '$city');";
		mysqli_query($conn, $sql);
		header("Location: profile.php?entered");
	}else{
		$sql = "UPDATE location SET state='$state', city='$city' WHERE username='$username';";
		mysqli_query($conn, $sql);
		header("Location: profile.php?updated");
	}


	$_SESSION['city']=$city;
	$_SESSION['state']=$state;
	
	exit();
}
?>