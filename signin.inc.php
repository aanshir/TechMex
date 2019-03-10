<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);


	//error handlers
	if (empty($username) || empty($pwd)) {
		header("Location: signin.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE username='$username';";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck < 1) {
			header("Location: signin.php?login=notmatch");
			exit();
			echo "INCORRECT USERNAME";
		}else{
			$row = mysqli_fetch_assoc($result);
				
				if($pwd == ($row['pwd'])){
					
					$_SESSION['logged']=true;
    				$_SESSION['username']=$username;
					$sql = "SELECT * FROM location WHERE username='$username';";
					$result = mysqli_query($conn, $sql);
					$resultcheck = mysqli_num_rows($result);
					$row=mysqli_fetch_assoc($result);
					$state = $row['state'];
					$city = $row['city'];

					if($resultcheck === 1){
						$_SESSION['state']=$state;
						$_SESSION['city']=$city;
						header("Location: profile.php");
						exit();
					}else{
						header("location: modify.php");
					}

				} else {
				//log in the user here
				header("Location: signin.php?pwderror");
				exit();

			}
		}
	}
}else{
	header("Location: signin.php?login=error");
	exit();
}
 
?>
