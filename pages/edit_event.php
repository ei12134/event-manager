<?php
include_once('../database/connection.php');
include_once('../database/events.php');

$event = getEventById($_GET['id']);
$title = "Edit - " . $event['title'];
include_once('../templates/header.php');

if ($event == null || $event['ownerId'] != $_SESSION['userId'])
	header("Location: ../index.php");
	
if (!isset($_SESSION['userId']) || !isset($_GET['id']))
	header("Location: ../index.php");

include_once('../templates/edit_event.php');
include_once('../templates/footer.php');
?>