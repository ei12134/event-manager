<?php
session_start();

if (!isset($_SESSION['userId']))
{
	header("Location: ../index.php");
}

include_once('../database/connection.php');
include_once('../database/events.php');

$eventType = filter_var($_POST['eventType'], FILTER_SANITIZE_SPECIAL_CHARS);
$visibility = filter_var($_POST['visibility'], FILTER_SANITIZE_SPECIAL_CHARS);
$imageURL = filter_var($_POST['imageURL'], FILTER_SANITIZE_SPECIAL_CHARS);
$title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
$eventTime = filter_var($_POST['eventTime'], FILTER_SANITIZE_SPECIAL_CHARS);

$eventID = createEvent($_SESSION['userId'], $eventType, $visibility, $imageURL, $title, $description, $eventTime);

header('Location: ../pages/event_item.php?id=' . $eventID);
?>
