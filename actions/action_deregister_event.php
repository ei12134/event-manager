<?php
	session_start();
	include_once('../database/connection.php');
	include_once('../database/registrations.php');
	
	if (isset($_SESSION['userId']) && isset($_SESSION['eventId']))
		deregisterEvent($_SESSION['eventId'], $_SESSION['userId']);
	
	header('Location: ../pages/my_registered_events.php');
?>