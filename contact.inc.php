<head>
	<script>
window.location = 'Contact.php';
</script>
</head>

<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$item = mysqli_real_escape_string($conn, $_POST['item']);
	
	$username = $_SESSION["username"];
	
	$sql = "SELECT * FROM contact WHERE username='$username';";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);
					

		$sql = "INSERT INTO contact (username,item) VALUES ('$username', '$item');";
		mysqli_query($conn, $sql);
		?> 
		<script type="text/javascript">
			back();
		</script>
		<?php
	
	exit();
}
?>