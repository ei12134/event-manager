<?php
include_once('../database/connection.php');
include_once('../database/users.php');
include_once('../database/events.php');

$title = "My events";
include_once('../templates/header.php');

if (!isset($_SESSION['userId']))
	header('Location: ../index.php');

$result = getOwnerEvents($_SESSION['userId']);

include_once('../templates/event_list.php');
include_once('../templates/footer.php');
?>