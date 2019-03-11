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
	<title>PROFILE</title>
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/all.css" />
	<link rel="stylesheet" href="css/screen.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<?php $result = exec("python test.py '1'"); $arr = json_decode($result); ?>
	<div id="wrapper">
		<div class="wrapper-holder">
			<header id="header">
				<a class="menu_trigger" href="#">menu</a>
					<nav id="nav">
						<ul>
							<li><a class="active" href="profile.php">Home</a></li>
							<li><a href="modify.php">MODIFY</a></li>
							<li><a href="Contact.php">CONTACTS</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
						</ul>
					</nav>
				<h1 class="logo">WELCOME !!</h1>
				<h2 class="slogan"><?php if($_SESSION['logged']==true) {echo $_SESSION["username"];}else{header("location: signin.php");} ?></h2>
			</header>
		</div>
		<div class="wrapper-holder grey">
			<section id="main">
				<h2>OVERVIEW OF <?php echo $_SESSION['city']; ?> ,<?php echo $_SESSION['state']; ?></h2>
				<div class="skills_holder">
					<div class="column">
						<h2>RISKY PLACES:</h2>
						<ul class="progress">
							<li><span style="width:<?php echo $arr[0][1]; ?>%"><?php echo $arr[0][0]; ?></span></li>
							<li><span style="width:<?php echo $arr[1][1]; ?>%"><?php echo $arr[1][0]; ?></span></li>
							<li><span style="width:<?php echo $arr[2][1]; ?>%"><?php echo $arr[2][0]; ?></span></li>
							<li><span style="width:<?php echo $arr[3][1]; ?>%"><?php echo $arr[3][0]; ?></span></li>
						</ul>
					</div>
					<div class="column column-add">
						<h2></h2><br>
						
						<ul class="progress">
							<li><span style="width:<?php echo $arr[4][1]; ?>%"><?php echo $arr[4][0]; ?></span></li>
							<li><span style="width:<?php echo $arr[5][1]; ?>%"><?php echo $arr[5][0]; ?></span></li>
							<li><span style="width:<?php echo $arr[6][1]; ?>%"><?php echo $arr[6][0]; ?></span></li>
							<li><span style="width:<?php echo $arr[7][1]; ?>%"><?php echo $arr[7][0]; ?></span></li>
						</ul>
					</div>
				</div>
				<ul class="plagin_list">
					<li class="li_1"><a href="#">ps</a></li>
					<li class="li_2"><a href="#">ai</a></li>
					<li class="li_3"><a href="#">ld</a></li>
					<li class="li_4"><a href="#">fl</a></li>
					<li class="li_5"><a href="#">html</a></li>
					<li class="li_6"><a href="#">wp</a></li>
					<li class="li_7"><a href="#">jq</a></li>
					<li class="li_8"><a href="#">seo</a></li>
				</ul>
				<ul class="plagin_list none">
					<li class="li_1"><a href="#">ps</a></li>
					<li class="li_2"><a href="#">ai</a></li>
					<li class="li_3"><a href="#">ld</a></li>
					<li class="li_4"><a href="#">fl</a></li>
				</ul>
				<ul class="plagin_list none">
					<li class="li_5"><a href="#">html</a></li>
					<li class="li_6"><a href="#">wp</a></li>
					<li class="li_7"><a href="#">jq</a></li>
					<li class="li_8"><a href="#">seo</a></li>
				</ul>
			</section>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/cells-by-row.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>