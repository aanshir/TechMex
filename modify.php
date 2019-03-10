<!DOCTYPE html>
<?php 

session_start();
include_once 'dbh.inc.php';
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="format-detection" content="telephone=no">
	<title>ADD LOCATION</title>
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/all.css" />
	<link rel="stylesheet" href="css/screen.css" />
	<style>
		.button {
		  position: relative;
		  background-color: #50af6f;
		  border: #6abb84;
		  font-size: 18px;
		  color: #FFFFFF;
		  padding: 10px;
		  width: 150px;
		  text-align: center;
		  -webkit-transition-duration: 0.4s; /* Safari */
		  transition-duration: 0.4s;
		  text-decoration: none;
		  overflow: hidden;
		  cursor: pointer;
		}

		.button:after {
		  content: "";
		  background: transparent;
		  border: #50af6f;
		  display: block;
		  position: absolute;
		  padding-top: 300%;
		  padding-left: 350%;
		  margin-left: -20px!important;
		  margin-top: -120%;
		  opacity: 0;
		  transition: all 0.8s
		}

		.button:active:after {
		  padding: 0;
		  margin: 0;
		  opacity: 1;
		  transition: 0s
		}
	</style>
</head>
<body>
	<div id="wrapper" class="portfolio">
		<div class="wrapper-holder">
			<header id="header">
				<a class="menu_trigger" href="#">menu</a>
					<nav id="nav">
						<ul>
							<li><a class="active" href="profile.php">Home</a></li>
							<li><a href="modify.php">MODIFY</a></li>
							<li><a href="Contact.html">CONTACTS</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
						</ul>
					</nav>
			</header>
		</div>
		<div class="wrapper-holder grey">
			<section id="main">
				<h2><?php if($_SESSION['logged']==true) {echo $_SESSION["username"];}else{header("location: signin.php");} ?> please enter your details.</h2>
				<div style="margin-left: 5em">
				<form action="modify.inc.php" method="POST">
					<label>STATE</label><BR>
					<input type="text" name="state" style="width:35em; height: 2.5em; border-radius: 0.25em;"><BR><BR>
					<LABEL>CITY</LABEL><BR>
					<input type="text" name="city" style="width:35em; height: 2.5em; border-radius: 0.25em;"><BR><BR>
					<button class="button" name="submit" type="submit">SUBMIT</button>
				</form>
				</div>
		</div>
		
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/cells-by-row.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>