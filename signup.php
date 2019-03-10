
<!DOCTYPE HTML>
<html>

<head>
	<title>Signup</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	
</head>

<body>
	<h1>SIGN UP</h1>
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="signup.inc.php" method="POST">
			<div class="agile-field-txt">
				<label> Username</label>
				<input type="text" name="username" placeholder="Enter User Name" required="" />
			</div>
			<div class="agile-field-txt">
				<label> E-mail</label>
				<input type="email" name="email" placeholder="Enter Email" required="" />
			</div>
			<div class="agile-field-txt">
				<label> password</label>
				<input type="password" name="password" placeholder="Enter Password" required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
				</div>
				
			</div>
			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //end script -->
			
				<input type="submit" value="SIGN UP" name="submit">
		</form>
	</div>
	
	<div class="copy-wthree">
		
	</div>
	
</body>
</html>