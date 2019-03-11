<!DOCTYPE html>
<?php 

session_start();
include_once 'dbh.inc.php';
?>
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="format-detection" content="telephone=no">
	<title>contacts</title>
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/all.css" />
	<link rel="stylesheet" href="css/contacts.css" />
	<link rel="stylesheet" href="css/screen.css" />
	<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="js/contacts.js"></script>
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
							<li><a href="Contact.php">CONTACTS</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
						</ul>
					</nav>
			</header>
		</div>

		

		<div class="wrapper-holder grey">
			<section id="main">
				<div id="todo-table">
			      <form action="contact.inc.php" method="post">
			        <input type="tel" name="item" placeholder="Add new contact">
			        <button type="submit" name="submit" style="padding: 20px;width: 30%;float: left;background: #23282e;border: 0;box-sizing: border-box;color: #fff;cursor: pointer;font-size: 20px;">ADD ITEM</button>
			      </form>
			      <?php 

			      $username = $_SESSION['username'];
			      $sql = "SELECT item FROM contact WHERE username = '$username';";
			      $result = mysqli_query($conn, $sql);
				  $resultcheck = mysqli_num_rows($result);
				   	while($row = mysqli_fetch_assoc($result)){

			       ?>

			      <ul style="list-style-type: none;padding: 0;margin: 0;">
			          <li style="width: 100%;padding: 20px;box-sizing: border-box;font-family: arial;font-size: 20px;cursor: pointer;letter-spacing: 1px;"><?php echo "$row[item]"; ?>
			      </ul>
			      <?php  }?>
			    </div>
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