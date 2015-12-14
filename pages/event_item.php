<?php
include_once('../database/connection.php');
include_once('../database/users.php');
include_once('../database/events.php');
include_once('../database/comments.php');

$event = getEventById($_GET['id']);
if ($event == null)
	header('Location: ../index.php');

$title = $event['title'];
include_once('../templates/header.php');

if (!isset($_SESSION['userId']))
	header('Location: ../index.php');

$comments = getComments($_GET['id']);
include_once('../templates/event.php');
include_once("../templates/comments_list.php");
include_once('../templates/footer.php');
?>