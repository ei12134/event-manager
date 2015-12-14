<?php	
include_once('../database/connection.php');
include_once('../database/users.php');
?>

<?php
session_start();

if (isset($_SESSION['userId']))
	header('Location: ../index.php');

if (!isset($_POST['username']) || userExists($_POST['username']))
{
	$_SESSION['error'] = "The specified username is already taken.";
	header('Location: ../pages/sign_up.php');
	print_r(userExists($_POST['username']));
	die();
}

if (!isset($_POST['password']) || !isset($_POST['password2']) || $_POST['password'] != $_POST['password2'])
{
	$_SESSION['error'] = "The passwords do not match.";
	header('Location: ../pages/sign_up.php');
	die();
}

createUser($_POST['username'], $_POST['name'], $_POST['password']);
header('Location: ../index.php');
?>
