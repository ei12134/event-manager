<?php
session_start();

if (!isset($_SESSION['userId']))
{
	header("Location: ../index.php");
}

include_once('../database/connection.php');
include_once('../database/events.php');

removeEvent($_POST['eventId']);

header('Location: ../pages/my_events.php');
?>
