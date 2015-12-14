<?php
include_once('../database/connection.php');
include_once('../database/events.php');

$title = 'Search results';
include_once('../templates/header.php');

if (!isset($_SESSION['userId']))
	header('Location: ../index.php');

$result = advancedSearchEvents($_GET['title'], $_GET['description'], $_GET['eventType']);

include_once('../templates/event_list.php');
include_once('../templates/footer.php');
?>