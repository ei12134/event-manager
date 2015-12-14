<?php
session_start();

include_once('../database/connection.php');
include_once('../database/users.php');

if (checkPassword($_POST['username'], $_POST['password']))
{
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['userId'] = getUserId($_POST['username']);
	header('Location: ../pages/my_events.php');
	die();
}

$_SESSION['error'] = 'Login failed: Invalid username or password';
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>