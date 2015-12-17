<?php 
session_start();
if($_SERVER["HTTPS"] != "on")
{
	header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' media='screen and (max-width: 799px)' href='../css/mobile.css' />
	<link rel='stylesheet' media='screen and (min-width: 800px)' href='../css/desktop.css' />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../javascript/jquery/jquery-ui.min.css">
	<script src="../javascript/jquery/jquery-1.11.3.min.js"></script>
	<script src="../javascript/jquery/jquery-ui.min.js"></script>
	<script src="../javascript/script.js"></script>
	<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="left">
				<h1><a href="../index.php">Event manager</a></h1>
			</div>

			<?php if (isset($_SESSION['username'])) { ?>
			<div class="right">
				<div>
					<form action="../actions/action_logout.php" method="post">
						<a href="../pages/user_info.php#content" >Logged in as <?=$_SESSION['username']?></a>					
						<input type="submit" value="Logout">
					</form>
				</div>
			</div>
			
			<?php } else { ?>

			<div class="right">
				<div> 
					<form action="../actions/action_login.php" method="post">
						<input type="text" name="username" required="required" placeholder="Username">
						<input type="password" name="password" required="required" placeholder="Password">
						<input type="submit" value="Login">
					</form>
				</div>
				<div>
					<a id="signup" href="../pages/sign_up.php">Not a member? Create an account</a>

				</div>
			</div>
			<?php } ?>
		</div>
	</header>

	<?php
	if (isset($_SESSION['username']))
		include_once '../templates/navigation.php';
	
	if (isset($_SESSION['error']))
	{
		?>
		<div class="error">
			<img src="../images/error.png">
			<?php echo $_SESSION['error'] ?>
		</div> <?php
		unset($_SESSION['error']);
	}
	?>
	
	<div id="content">