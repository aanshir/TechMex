<!DOCTYPE HTML>
<html>

<head>
	<title>Signin</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	
</head>

<body>
	<h1>SIGN IN</h1>
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="signin.inc.php" method="post">
			<div class="agile-field-txt">
				<label> Username</label>
				<input type="text" name="username" placeholder="Enter Username" required="" />
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
			
				<input type="submit" value="SIGN IN" name="submit">
		</form>
	</div>
	
	<div class="copy-wthree">
		
	</div>
	
</body>
</html>